<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();
        $cart = json_decode($user->cart, true);

        $total_price = 0;
        $same_day = true;
        foreach ($cart as $cart_item) {
            $total_price += intval($cart_item['total']);

            if($same_day && $cart_item['delivery'] == 0) {
                $same_day = false;
            }
        }

        return view('frontend.checkout', compact('user', 'cart', 'total_price', 'same_day'));
    }


    public function placeOrder(Request $request)
    {
        $orderTable = DB::table('orders');

        $user = DB::table('users')->where('id', Auth::id());
        $user_data = $user->first();

        $address_list = json_decode($user_data->address, true);
        $address = $address_list[$request->receiver_address];
        $address_txt = $address['name'].', '.$address['phone'].', '.$address['address'];


        $data = [
            'user_id' => Auth::id(),
            'created_at' => now(),

            'name' => $request->billing_name,
            'phone' => $request->billing_phone,
            'email' => $request->customer_email,
            'delivery_address' => $address_txt,
            'optional_address' => $request->optional_address ?: '',
            'notes' => $request->instruction ?: '',

            'items' => $user_data->cart,
            'item_total' => $request->subtotal,

            'delivery_type' => $request->has('home-delivery') ? true : false,                   // true --> Home Deliver and false --> Pickup
            'home_area' => $request->has('home-delivery') ? $request->shipping_area : '-1',
            'store_no' =>   $request->has('store-pickup') ? $request->outlate : '-1',

            'delivery_fee' => $request->delivary_charge,
            'total' => $request->final_price,

            'delivery_date' => $request->order_date,
            'delivery_time' => $request->order_take_deliver_time,

            'payment_method' => $request->has('payment_method') ? 0 : 1,      // For now only one payment method
        ];

        $orderTable->insert($data);
        $user->update(['cart' => '[]']);

        $notification = array('message' => 'Order Placed!', 'alert-type' => 'success');
        return redirect()->route('front.index')->with($notification);
    }
}
