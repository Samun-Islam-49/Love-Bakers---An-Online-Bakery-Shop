@extends('layouts.app')
@section('main_content')

<style>
    /* Page Container */
    .container {
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .col-lg-8,
    .col-lg-4 {
        padding: 10px;
    }

    .col-lg-8 {
        flex: 0 0 65%; /* Occupies 65% width */
        max-width: 65%;
    }

    .col-lg-4 {
        flex: 0 0 30%; /* Occupies 30% width */
        max-width: 30%;
    }

    /* Step-by-Step Header */
    .step-by {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        font-size: 16px;
    }

    .step-by .title {
        color: #6c757d;
        text-decoration: none;
        font-weight: bold;
        flex: 1;
        text-align: center;
    }

    .step-by .title.active {
        color: #4DAE67;
    }

    /* Cart Table Styling */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .cart-table th {
        text-align: left;
        font-size: 14px;
        color: #6c757d;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .cart-table td {
        padding: 10px 5px;
        vertical-align: middle;
    }

    .cart-table .product-thumbnail img {
        border-radius: 8px;
    }

    .product-name {
        font-weight: bold;
        color: #333;
    }

    .product-subtotal,
    .product-quantity {
        text-align: center;
    }

    .product-quantity {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-quantity button {
        background-color: #f1f1f1;
        border: none;
        width: 30px;
        height: 45px;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        color: #333;
        font-weight: normal;

    }

    .product-quantity input {
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 0 5px;
    }

    .product-close a {
        background-color: #e5494a;
        color: white;
        padding: 5px 10px;
        border-radius: 50%;
        display: inline-block;
        text-align: center;
        font-size: 14px;
    }

    .cart-actions {
        text-align: left;
    }

    .cart-actions .btn {
        background-color: #4DAE67;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        text-decoration: none;
    }

    /* Cart Totals Section */
    .summary {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 10px;
        background-color: white;
    }

    .summary-title {
        font-size: 18px;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .summary-subtotal {
        display: flex;
        justify-content: space-between;
        padding: 0;
    }

    .shipping {
               border-bottom: 1px solid #ddd;
    }

    .summary-subtotal:last-child {
        border-bottom: none;
        padding-top: 5px;
    }

    .btn-checkout {
        display: block;
        text-align: center;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: white;
        background-color: #4DAE67;
        border-radius: 5px;
        margin-top: 20px;
        text-decoration: none;
    }

    /* Media Query for Smaller Screens */
    @media (max-width: 767px) {
        .row {
            flex-direction: column;
        }

        .col-lg-8,
        .col-lg-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .summary {
            margin-top: 20px;
        }
    }

    /* Cart Table Styling */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .cart-table th {
        text-align: center; /* Aligns the header text to the center */
        font-size: 14px;
        color: #6c757d;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .cart-table td {
        padding: 10px 5px;
        vertical-align: middle;
        text-align: center; /* Center-aligns all table data by default */
    }

    /* Optional: For specific alignment, if needed */
    .cart-table .product-name {
        text-align: left; /* Left-aligns the product name */
        font-weight: bold;
        color: #333;
    }

    .sticky-header {
        margin-bottom: 15px;
    }

    #dynamic_cart_display {
        padding-bottom: 20px;
    }

    .header-top {
        max-height: 50px;
    }

    .header-middle {
        max-height: 125px;
    }

    /* .footer {
        margin-top: -50px
    } */

</style>

<div class="display-search-result">
	<main class="main cart">
		<div class="pb-10 page-content pt-7 view-cart-product">
			<div class="container mt-3 mb-2 mt-md-7">
				<div class="row">
                        <div class="col-md-8 pr-lg-4">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="cstb">Product</span>
                                        </th>
                                        <th></th>
                                        <th>
                                            <span class="cstb">Price</span>
                                        </th>
                                        <th>
                                            <span class="cstb">quantity</span>
                                        </th>
                                        <th class="cstb">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key=>$data)
                                        <tr id="{{ 'item-'.$data['cart_id'] }}">
                                            <td class="product-thumbnail">
                                                <figure>
                                                    <a>
                                                        <img src="{{ $data['image'] }}" width="45" height="45" alt="product">
                                                    </a>
                                                </figure>
                                            </td>
                                            <td class="product-name">
                                                <div class="product-name-section">
                                                    <a><span class="cstb">{{ $data['name'] }}</span></a>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount cstb">Tk. <span id="{{ 'product-price-'.$data['cart_id'] }}">{{ $data['price'] }}</span></span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-group"><i class=""></i>
                                                    <button class="quantity-minus" onclick="update_quantity('{{ $data['cart_id'] }}', -1)">-</button>
                                                    <input id="{{ 'product-quantity-'.$data['cart_id'] }}" class="form-control" value="{{ $data['quantity'] }}" type="number" min="1" max="1000000" readonly="">
                                                    <button class="quantity-plus" onclick="update_quantity('{{ $data['cart_id'] }}', 1)">+</button>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount cstb">Tk. <span id="{{ 'product-total-'.$data['cart_id'] }}">{{ $data['total'] }}</span></span>
                                            </td>
                                            <td class="product-close">
                                                <a class="product-remove" style="background:#e5494a;color:white;cursor:pointer" title="Remove this product" onclick="remove_item('{{ $data['cart_id'] }}')">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="pt-4 mb-6 cart-actions">
                                <a href="{{ route('front.index') }}" style="background:#4DAE67;border:none" class="mb-4 mr-4 btn btn-dark btn-md btn-rounded btn-icon-left">
                                    <i class="fa-solid fa-arrow-left"></i> <span class="cst" style="padding-top: 5px"> Continue Shopping </span></a>
                            </div>
                        </div>
                        <div class="col-md-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar" data-sticky-options="{bottom: 20}">
                                <div class="mb-4 summary">
                                    <h3 class="text-left summary-title cstb">Cart Totals</h3>
                                    <div class="shipping">
                                        <div>
                                            <div class="summary-subtotal" style="margin-bottom: -5px">
                                                <div>
                                                    <h4 class="cstb"> <span style="color: #6c757d">Subtotal</span> </h4>
                                                </div>
                                                <div>
                                                    <sub class="summary-subtotal-price cstb cart-price" style="color: #6c757d; font-size: 1.65rem">Tk.470</sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total">
                                        <div>
                                            <div class="summary-subtotal">
                                                <div>
                                                    <p class="text-left cst" style="color: #6c757d;">Delivery charge calculate at checkout.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('checkout.index') }}" style="background:#4DAE67;border:none" class="btn btn-dark btn-rounded btn-checkout">
                                        <span class="cstb">Proceed to checkout</span>
                                    </a>
                                </div>
                            </div>
                        </div>

				</div>
			</div>
		</div>
	</main>
</div>

<script>
    function remove_item(cart_id) {
        var cartItem = document.getElementById('item-' + cart_id);

        // Call `remove_from_cart` and pass the success callback to remove the item
        remove_from_cart(cart_id, function () {
            cartItem.remove();
        });
    }
</script>

<script>
    function update_quantity(cart_id, val) {
        var quantity_field = $('#product-quantity-' + cart_id);

        var quantity = quantity_field.val();
        quantity = parseInt(quantity.replace(/[^\d]/g, ''), 10);
        quantity += val;

        if (quantity == 0) {
            return;
        }

        var price = $('#product-price-' + cart_id).text().trim();
        price = parseInt(price.replace(/[^\d]/g, ''), 10);

        var total = quantity * price;

        var subtotal_field = $('#product-total-' + cart_id);

        update_cart_item(cart_id, quantity, total, function () {
            subtotal_field.text(total);
            quantity_field.val(quantity);
        });
    }
</script>


@endsection
