@extends('layouts.app')
@section('main_content')

<main>
    <div class="container mt-7">
        <form action="{{ route('checkout.place-order') }}" method="POST" class="form" id="loading_btn_id" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="m-6 col-md-7 customer-details">
                    <h3 class="text-left title title-simple text-uppercase cstb" style="font-size: 2rem; margin-left: -15px" >Customer Details</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="cstb">Name <span style="color: red">*</span></label>
                            <input type="text" value="{{ $user->name }}" class="form-control" name="billing_name" id="billing_name" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required />
                        </div>

                        <div class="col-md-6">
                            <label class="cstb">Phone Number <span style="color: red">*</span></label>
                            <input type="tel" value="{{ $user->phone }}" class="form-control" name="billing_phone" id="billing_phone" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required />
                        </div>

                        <div class="col-md-12">
                            <label class="cstb">Email <span style="color: red">*</span></label>
                            <input type="email" value="{{ $user->email }}" class="form-control" name="customer_email" id="customer_email" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required />
                        </div>

                        @php
                            $address_list = json_decode($user->address, associative: true) ?? [];
                        @endphp

                        <div class="col-md-12 form-checkbox">
                            <label class="cstb">Receiver/Ship Address <span style="color: red">*</span></label>
                            <select name="receiver_address" id="receiver_address" class="form-control" onchange="" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>
                                @foreach ($address_list as $data)
                                    <option value="{{ $data['id'] }}" {{ ($data['default'] == 1) ? 'selected' : '' }}>
                                        {{ $data['name'].', '.$data['phone'].', '.$data['address'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="optional_address" placeholder="Apartment, suite, unit etc.(optional)" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" />
                        </div>
                    </div>

                    <div class="row">
                        <h2 class="text-left title title-simple text-uppercase cstb" style="font-size: 2rem; margin-left: -15px;">
                            Additional Information
                        </h2>

                        <div class="col-md-12">
                            <label class="cstb">Order Notes (Optional)</label>
                            <textarea name="instruction" class="pt-2 pb-2 mb-0 form-control cst" cols="30" rows="5" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
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
                                <h3 class="text-center title title-simple text-uppercase cstb" style="font-size: 2rem">Your Order</h3>
                            </div>

                            <div class="mt-3 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Products</h6>
                            </div>

                            @php
                                $firstKey = array_key_first($cart);
                            @endphp

                            <!-- Product list --->
                            @foreach ($cart as $key => $data)
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
                                        <h6 class="cstb">{{ 'Tk. '.$total_price }}</h6>
                                        <input type="hidden" name="subtotal" id="subtotal" value="{{ $total_price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Calculate Shipping</h6>
                            </div>

                            <div class="col-md-12" style="margin-top: 8px">
                                <input type="checkbox" class="custom-checkbox checked" checked="checked" id="home-delivery" name="home-delivery">
                                <label class="text-left form-control-label ls-s cst" style="padding-top: 5px" for="home-delivery">Home Delivery</label>
                            </div>

                            <div class="col-md-12" style="margin-top: 8px">
                                <div id="home_delivery" class="expanded">
                                    <select id="home_delivery_area" name="shipping_area" class="form-control" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" onchange="calculate_final_price()" required>
                                        <option value="-1" disabled>Select Area</option>
                                        <option value="1" selected>Inside Rajshahi</option>
                                        <option value="0">Outside Rajshahi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top: -8px">
                                <input type="checkbox" class="custom-checkbox" id="store-pickup" name="store-pickup">
                                <label class="text-left form-control-label ls-s cst" style="padding-top: 3px" for="store-pickup">Pick-up From Store(FREE)</label>
                            </div>

                            <div class="col-md-12" style="margin-top: 8px">
                                <div id="store_pickup" class="collapsed" style="display:none">
                                    <select name="outlate" id="store_pickup_name" class="form-control" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" onchange="calculate_final_price()">
                                        <option value="-1" disabled>Select Store</option>
                                        <option value="1" selected>Rajshahi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4 col-md-12 row">
                                <div class="col-md-9">
                                    <p class="cst">Delivery Charge</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="cst">Tk. <span id="delivary_charge_field">0</span></p>
                                    <input type="hidden" name="delivary_charge" id="delivary_charge" value="0">
                                </div>
                            </div>

                            <div class="col-md-12" style="border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;">
                                <div class="col-md-12 row" style="margin-bottom: -12px; margin-top: 12px">
                                    <div class="col-md-8">
                                        <h6 class="cstb">Total</h6>
                                    </div>
                                    <div class="text-right col-md-4">
                                        <h6 class="cstb" style="color: #4DAE67">Tk. <span id="final_price_field">0</span></h6>
                                        <input type="hidden" name="final_price" id="final_price" value="0">
                                    </div>
                                </div>
                            </div>


                            <div class="mt-6 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Select Delivery Date-Time</h6>
                            </div>

                            <div class="col-md-12" style="margin-top: 12px">
                                <input class="form-control" id="order_date_val" onchange="handleDateChange(this)" type="date" name="order_date" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required />
                            </div>

                            <div class="col-md-12">
                                <select id="delivery_date_time" name="order_take_deliver_time" class="form-control" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>
                                    <option id="h-none" value="" selected disabled>Select Delivery Time</option>
                                    <option id="h-10" value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                    <option id="h-11" value="11:01 AM - 12:00 PM">11:01 AM - 12:00 PM</option>
                                    <option id="h-12" value="12:01 PM - 1:00 PM">12:01 PM - 1:00 PM</option>
                                    <option id="h-13" value="1:01 PM - 2:00 PM">1:01 PM - 2:00 PM</option>
                                    <option id="h-14" value="2:01 PM - 3:00 PM">2:01 PM - 3:00 PM</option>
                                    <option id="h-15" value="3:01 PM - 4:00 PM">3:01 PM - 4:00 PM</option>
                                    <option id="h-16" value="4:01 PM - 5:00 PM">4:01 PM - 5:00 PM</option>
                                    <option id="h-17" value="5:01 PM - 6:00 PM">5:01 PM - 6:00 PM</option>
                                    <option id="h-18" value="6:01 PM - 7:00 PM">6:01 PM - 7:00 PM</option>
                                    <option id="h-19" value="7:01 PM - 8:00 PM">7:01 PM - 8:00 PM</option>
                                    <option id="h-20" value="8:01 PM - 9:00 PM">8:01 PM - 9:00 PM</option>
                                    <option id="h-21" value="9:01 PM - 10:00 PM">9:01 PM - 10:00 PM</option>
                                </select>
                            </div>


                            <div class="mt-6 col-md-12" style="border-bottom: 1px solid #ddd;">
                                <h6 class="cstb" style="margin-bottom: 8px">Payment Methods</h6>
                            </div>

                            <div class="col-md-12" style="margin-top: 8px">
                                <input type="checkbox" class="custom-checkbox checked" checked="checked" id="payment_method" name="payment_method" disabled>
                                <label class="text-left form-control-label ls-s cst" style="padding-top: 5px" for="payment_method">Cash On Delivery</label>
                            </div>

                            <div class="col-md-12" style="margin-top: 24px">
                                <label class="form-control-label cst" for="terms-condition"> *By clicking Place Order you agree to our
                                    <a href="/">
                                        <span class="cstb">Terms and Conditions</span>
                                    </a>
                                </label>
                            </div>

                            <div class="text-center col-md-12" style="margin-top: 24px; margin-bottom: 24px">
                                <button type="submit" style="background:#4DAE67;border:none" class="btn btn-md btn-primary btn-rounded btn-order loading-btn1"><span class="cstb">Place Order</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</main>

<script>
       //home delivery area select
       $("#home-delivery").click(function() {
        if ($(this).prop("checked") == true) {
            $("#home_delivery").slideDown();
            $("#store_pickup").slideUp();
            $("#home_delivery_area").attr('required', true);
            $("#store_pickup_name").attr('required', false);
            $("#store-pickup").prop('checked', false);
            $("#store_pickup_name").val('-1');
            $("#home_delivery_area").val('1');
        }
        if ($(this).prop("checked") == false) {
            $("#store-pickup").prop('checked', true);
            $("#store_pickup").slideDown();
            $("#home_delivery").slideUp();
            $("#store_pickup_name").attr('required', true);
            $("#home_delivery_area").attr('required', false);
            $("#home_delivery_area").val('-1');
            $("#store_pickup_name").val('1');
        }

        calculate_final_price();
    });
    //pickup delivery area select
    $("#store-pickup").click(function() {
        if ($(this).prop("checked") == true) {
            $("#store_pickup").slideDown();
            $("#home_delivery").slideUp();
            $("#store_pickup_name").attr('required', true);
            $("#home_delivery_area").attr('required', false);
            $("#home-delivery").prop('checked', false);
            $("#home_delivery_area").val('-1');
            $("#store_pickup_name").val('1');
        }
        if ($(this).prop("checked") == false) {
            $("#home-delivery").prop('checked', true);
            $("#home_delivery").slideDown();
            $("#store_pickup").slideUp();
            $("#home_delivery_area").attr('required', true);
            $("#store_pickup_name").attr('required', false);
            $("#store_pickup_name").val('-1');
            $("#home_delivery_area").val('1');
        }

        calculate_final_price();
    });
</script>

<script>
    $(document).ready(function () {
        // Get the PHP variable $same_day passed from Blade
        const sameDay = @json($same_day);

        // Get the server time passed from Blade
        const serverTime = new Date("@php echo now()->toISOString(); @endphp");

        const year = serverTime.getFullYear();
        const month = String(serverTime.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
        const day = String(serverTime.getDate()).padStart(2, '0');
        const hour = serverTime.getHours(); // Get local hour (0-23)

        // Default to today's date
        let minDate = `${year}-${month}-${day}`;

        // Exclude today if $same_day is false or the local time is past 10 PM
        if (!sameDay || hour >= 22) {
            const tomorrow = new Date(serverTime);
            tomorrow.setDate(serverTime.getDate() + 1);

            const tomorrowYear = tomorrow.getFullYear();
            const tomorrowMonth = String(tomorrow.getMonth() + 1).padStart(2, '0');
            const tomorrowDay = String(tomorrow.getDate()).padStart(2, '0');

            minDate = `${tomorrowYear}-${tomorrowMonth}-${tomorrowDay}`;
        }

        // Set the min attribute on the date input
        $('#order_date_val').attr('min', minDate);

        // Debugging (optional)
        console.log('Server Time (UTC):', serverTime);
        console.log('Same Day:', sameDay);
        console.log('Min Date:', minDate);
    });
</script>



<script>
    function calculate_final_price() {
        var area = $('#home_delivery_area').val();

        var total = $('#subtotal').val();
        total = parseInt(total.replace(/[^\d]/g, ''), 10);

        var fee = 0;

        if(area != -1 && area != null) {
            fee = (area == 1) ? 60 : 120;
        }

        total += fee;

        $('#final_price_field').text(total);
        $('#final_price').val(total);

        $('#delivary_charge_field').text(fee);
        $('#delivary_charge').val(fee);
    }

    $(document).ready(function () {
        calculate_final_price();
    });
</script>


<script>
    function disablePastOptions(selectedDate, serverHour) {
        // Get today's date in the format YYYY-MM-DD
        const today = new Date().toISOString().split('T')[0];

        // If the selected date is today, disable past options
        if (selectedDate === today) {
            $("#delivery_date_time option").each(function () {
                const optionId = $(this).attr('id');
                if (optionId && optionId.startsWith('h-')) {
                    const hour = parseInt(optionId.split('-')[1], 10); // Extract hour from id
                    // Disable options if the hour is less than or equal to the server hour
                    if (hour <= serverHour) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                }
            });
        } else {
            // Enable all options if the selected date is not today
            $("#delivery_date_time option").prop('disabled', false);
        }
    }

    function handleDateChange(input) {
        const selectedDate = input.value; // Get the selected date from the date picker

        // Get the current server time in hours (simulate or pass via Blade)
        const serverHour = new Date().getHours(); // Replace this with the server hour passed from Blade if needed

        // Call the function with the selected date and server hour
        disablePastOptions(selectedDate, serverHour);
    }
</script>



@endsection
