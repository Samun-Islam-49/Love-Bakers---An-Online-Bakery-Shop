<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();
        $address_list = json_decode($user->address, associative: true) ?? [];
        // dd($address_list);
        $default_address = [];

        if($address_list) {
            foreach($address_list as $address) {
                if($address['default']){
                    $default_address = $address;
                    break;
                }
            }
        }

        $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        // dd($user, $address_list, $default_address);
        // dd($orders);
        return view('frontend.profile', compact('user', 'address_list', 'default_address', 'orders'));
    }

    public function addAddress(Request $request)
    {
        $user = DB::table('users')->where('id', Auth::id());
        $data = $user->first();

        // Decode addresses
        $addresses = json_decode($data->address, true) ?? []; // Handle null case

        // Calculate new ID (using a unique string-based key)
        $new_id = uniqid('addr_');

        // Handle default address
        $default = $request->has('default') ? 1 : 0;
        if ($default) {
            foreach ($addresses as &$address) {
                if ($address['default']) {
                    $address['default'] = 0;
                }
            }
            unset($address); // Unset reference to avoid issues
        }

        // Add the new address
        $address = [
            'id' => $new_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'default' => $default,
        ];

        $addresses[$new_id] = $address; // Use string-based key

        // Update the user table
        $user->update(['address' => json_encode($addresses)]);

        $notification = array('message' => 'New address registered!', 'alert-type' => 'success');
        return redirect(route('customer.profile') . '#addressBook')->with($notification);
    }


    public function removeAddress(Request $request)
    {
        $user = DB::table('users')->where('id', Auth::id());

        $user_data = $user->first();
        $address_list = json_decode($user_data->address, associative: true) ?? [];
        unset($address_list[$request->id]);

        $user->update(['address' => json_encode($address_list)]);

        return response()->json(['success' => true]);
    }


    public function cancelOrder(Request $request)
    {
        DB::table('orders')->delete($request->id);
        return response()->json(['success' => true]);
    }


    public function updateAddress(Request $request)
    {
        $user = DB::table('users')->where('id', Auth::id());
        $user_data = $user->first();

        $address_list = json_decode($user_data->address, associative: true) ?? [];
        $address = $address_list[$request->id];

        $default = $request->has('default') ? 1 : 0;

        $address['name'] = $request->name;
        $address['phone'] = $request->phone;
        $address['address'] = $request->address;
        $address['default'] = $default;

        // Handle default address
        if ($default) {
            foreach ($address_list as &$addr) {
                if ($addr['default']) {
                    $addr['default'] = 0;
                }
            }
            unset($addr); // Unset reference to avoid issues
        }

        $address_list[$request->id] = $address;
        $user->update(['address' => json_encode($address_list)]);

        $notification = array('message' => 'Address updated!', 'alert-type' => 'success');
        return redirect(route('customer.profile') . '#addressBook')->with($notification);
    }

}
