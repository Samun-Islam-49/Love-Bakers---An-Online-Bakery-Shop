<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        return view('frontend.order.view', compact('order'));
    }

    public function edit($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        $self = DB::table('users')->where('id', Auth::id());
        $user = $self->first();

        $cart = json_decode($order->items, true);

        $total_price = 0;
        $same_day = true;
        foreach ($cart as $cart_item) {
            $total_price += intval($cart_item['total']);

            if($same_day && $cart_item['delivery'] == 0) {
                $same_day = false;
            }
        }

        return view('frontend.order.edit', compact('order','user', 'cart', 'total_price', 'same_day'));
    }


    public function update(Request $request)
    {
        $orderTable = DB::table('orders')->where('id', $request->prev_id);

        $user = DB::table('users')->where('id', Auth::id());
        $user_data = $user->first();

        $address_list = json_decode($user_data->address, true);
        $address = $address_list[$request->receiver_address];
        $address_txt = $address['name'].', '.$address['phone'].', '.$address['address'];


        $data = [
            'user_id' => Auth::id(),
            'updated_at' => now(),

            'name' => $request->billing_name,
            'phone' => $request->billing_phone,
            'email' => $request->customer_email,
            'delivery_address' => $address_txt,
            'optional_address' => $request->optional_address ?: '',
            'notes' => $request->instruction ?: '',

            'items' => $request->items,
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

        // dd($data);

        $orderTable->update($data);

        $notification = array('message' => 'Order updated!', 'alert-type' => 'success');
        return redirect(route('customer.profile') . '#orders')->with($notification);
    }
}
