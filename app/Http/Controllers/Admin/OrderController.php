<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query=DB::table('orders');


            // Status filter
            if ($request->status != -1) {
                 $query->where('status', $request->status);
            }


            $data = $query->orderByDesc('id')->get();


            return DataTables::of($data)
                ->editColumn('status', function($row){
                    $statusIcon = '';

                    if($row->status == 1) {
                        $statusIcon = '<i class="fa-solid fa-circle-check btn btn-success status-toggle" data-id="'.$row->id.'" data-type="status" data-status="1"></i>';
                    } else if ($row->status == 2) {
                        $statusIcon = '<i class="fa-solid fa-clipboard-check btn btn-danger status-toggle" data-id="'.$row->id.'" data-type="status" data-status="2"></i>';
                    } else {
                        $statusIcon = '<i class="fa-solid fa-circle-info btn btn-secondary status-toggle" data-id="'.$row->id.'" data-type="status" data-status="0"></i>';
                    }
                    return $statusIcon;
                })
                ->editColumn('delivery_type', function($row){
                    $deliveryIcon = '';
                    if($row->delivery_type) {
                        $deliveryIcon = '<i class="fa-solid fa-truck-fast btn btn-secondary"></i>';
                    } else {
                        $deliveryIcon = '<i class="fa-solid fa-hand-holding-heart btn btn-success"</i>';
                    }
                    return $deliveryIcon;
                })
                ->editColumn('delivery_address', function($row){
                    $address = '';

                    if($row->delivery_type) {
                        if($row->home_area) {
                            $address = '<i class="fa-solid fa-house-chimney"></i> ';
                        } else {
                            $address = '<i class="fa-solid fa-mountain-sun"></i> ';
                        }

                        $address .= $row->delivery_address;
                    } else {
                        $address = 'Rajshahi';
                    }
                    return $address;
                })
                ->editColumn('delivery_date', function($row){
                    $date_time = $row->delivery_date.' ('.$row->delivery_time.')';
                    return $date_time;
                })
                ->addColumn('action', function($row) {
                    $actionbtn = '
                    <a href="'.route('order.edit-order', ['id' => $row->id]).'" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a>
                    <a href="'.route('order.view-order', ['id' => $row->id]).'" class="btn btn-primary btn-sm view"><i class="fas fa-eye"></i></a>
                    <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';

                    return $actionbtn;
                })

                ->rawColumns(['action', 'delivery_type', 'status', 'delivery_address', 'delivery_date'])
                ->make(true);
        }

        return view('admin.orders.orders');
    }

    public function toggleStatus(Request $request)
    {
        $order = DB::table('orders')->where('id', $request->id);
        $order->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'alert_type' => 'success',
            'message' => 'Status Updated!'
        ]);
    }

    public function delete($id)
    {
        DB::table('orders')->delete($id);

        return response()->json([
            'success' => true,
            'alert_type' => 'success',
            'message' => 'Order Deleted!'
        ]);
    }

    public function view($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        return view('frontend.order.view', compact('order'));
    }

    public function edit($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        $self = DB::table('users')->where('id', $order->user_id);
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

        return view('admin.orders.edit', compact('order','user', 'cart', 'total_price', 'same_day'));
    }


    public function update(Request $request)
    {
        $orderTable = DB::table('orders')->where('id', $request->prev_id);

        $user = DB::table('users')->where('id', $request->user_id);
        $user_data = $user->first();

        $address_list = json_decode($user_data->address, true);
        $address = $address_list[$request->receiver_address];
        $address_txt = $address['name'].', '.$address['phone'].', '.$address['address'];


        $data = [
            'user_id' => $request->user_id,
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
        return redirect()->route('order.index')->with($notification);
    }
}
