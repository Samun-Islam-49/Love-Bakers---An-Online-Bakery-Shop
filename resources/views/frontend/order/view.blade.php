@extends('layouts.app')
@section('main_content')

<main>
    <div class="container mt-7">
        <form action="{{ route('checkout.place-order') }}" method="POST" class="form" id="loading_btn_id" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="m-6 col-md-7 customer-details">
                    <h3 class="text-left title title-simple text-uppercase cstb" style="font-size: 2rem; margin-left: -15px" >Biller Details</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="cstb">Name</label>
                            <input type="text" value="{{ $order->name }}" class="form-control" name="billing_name" id="billing_name" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                        </div>

                        <div class="col-md-6">
                            <label class="cstb">Phone Number</label>
                            <input type="tel" value="{{ $order->phone }}" class="form-control" name="billing_phone" id="billing_phone" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                        </div>

                        <div class="col-md-12">
                            <label class="cstb">Email</label>
                            <input type="email" value="{{ $order->email }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                        </div>

                        <div class="col-md-12 form-checkbox">
                            <label class="cstb">Receiver/Ship Address</label>
                            <input type="email" value="{{ $order->delivery_address }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="optional_address" placeholder="" value="{{ $order->optional_address }}" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                        </div>
                    </div>

                    <div class="row">
                        <h2 class="text-left title title-simple text-uppercase cstb" style="font-size: 2rem; margin-left: -15px;">
                            Additional Information
                        </h2>

                        <div class="col-md-12">
                            <label class="cstb">Order Notes</label>
                            <textarea name="instruction" class="pt-2 pb-2 mb-0 form-control cst" cols="30" rows="5" readonly>{{ $order->notes }}</textarea>
                        </div>
                    </div>


                </div>

                <div class="col-md-1">
                    <!-- middle spacing -->
                </div>

                <div class="mb-6 col-md-4" style="border: 1px solid #ddd; padding-right: 16px; padding-left: 16px;">
                    <div class="mt-1 row">
                        <div class="summary">
                            <div class="mb-0 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h3 class="text-center title title-simple text-uppercase cstb" style="font-size: 2rem">Order Details</h3>
                            </div>

                            <div class="mt-3 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Products</h6>
                            </div>

                            @php
                                $items = json_decode($order->items, true);
                                $firstKey = array_key_first($items);
                            @endphp

                            <!-- Product list --->
                            @foreach ($items as $key => $data)
                                <div class="col-md-12 row" style="margin-top: {{ ($firstKey == $key) ? '8' : '-15' }}px; margin-bottom: 0">
                                    <div class="col-md-9">
                                        <p class="cst">{{ $data['name'].' x '.$data['quantity'] }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="cst">{{ 'Tk. '.$data['total'] }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12" style="border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;">
                                <div class="col-md-12 row" style="margin-bottom: -12px; margin-top: 12px">
                                    <div class="col-md-8">
                                        <h6 class="cstb">Subtotal</h6>
                                    </div>
                                    <div class="text-right col-md-4">
                                        <h6 class="cstb">{{ 'Tk. '.$order->item_total }}</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Delivery Details</h6>
                            </div>

                            @if ($order->delivery_type == 1)
                                <div class="col-md-12" style="margin-top: 8px">
                                    <input type="checkbox" class="custom-checkbox checked" checked="checked" id="home-delivery" name="home-delivery" disabled>
                                    <label class="text-left form-control-label ls-s cst" style="padding-top: 5px" for="home-delivery">Home Delivery</label>
                                </div>

                                <div class="col-md-12" style="margin-top: 8px">
                                    <div id="home_delivery" class="expanded">
                                        <input type="email" value="{{ ($order->home_area ? 'Inside Rajshahi' : 'Outside Rajshahi') }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12" style="margin-top: 8px">
                                    <input type="checkbox" class="custom-checkbox checked" checked="checked" id="store-pickup" name="store-pickup" disabled>
                                    <label class="text-left form-control-label ls-s cst" style="padding-top: 3px" for="store-pickup">Pick-up From Store</label>
                                </div>

                                <div class="col-md-12" style="margin-top: 8px">
                                    <div id="store_pickup" class="expanded">
                                        <input type="email" value="{{ 'Rajshahi' }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                                    </div>
                                </div>
                            @endif


                            <div class="mt-4 col-md-12 row">
                                <div class="col-md-9">
                                    <p class="cst">Delivery Charge</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="cst">Tk. <span id="delivary_charge_field">{{ $order->delivery_fee }}</span></p>
                                </div>
                            </div>

                            <div class="col-md-12" style="border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;">
                                <div class="col-md-12 row" style="margin-bottom: -12px; margin-top: 12px">
                                    <div class="col-md-8">
                                        <h6 class="cstb">Total</h6>
                                    </div>
                                    <div class="text-right col-md-4">
                                        <h6 class="cstb" style="color: #4DAE67">Tk. <span id="final_price_field">{{ $order->total }}</span></h6>
                                    </div>
                                </div>
                            </div>

                            @php
                                $delivery_date = date('d-M-Y', strtotime($order->delivery_date));
                            @endphp


                            <div class="mt-6 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Delivery Date-Time</h6>
                            </div>

                            <div class="col-md-12" style="margin-top: 12px">
                                <input type="text" value="{{ $delivery_date }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                            </div>

                            <div class="col-md-12">
                                <input type="text" value="{{ $order->delivery_time }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" readonly />
                            </div>


                            <div class="mt-6 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Payment Details</h6>
                            </div>

                            <div class="col-md-12" style="margin-top: 8px; margin-bottom: 24px">
                                <input type="checkbox" class="custom-checkbox checked" checked="checked" id="payment_method" name="payment_method" disabled>
                                <label class="text-left form-control-label ls-s cst" style="padding-top: 5px" for="payment_method">Cash On Delivery</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection
