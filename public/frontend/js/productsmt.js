////////product management js file/////
$(document).ready(function() {
    //function call
    getProductOnload();
    //
    getCartProduct();
});
//regular product add to cart
function addToCart_old(id) {
    var quantity = $("#quantity" + id).val();
    var image_path = $("#image_path" + id).val();
    var cake_on_message = $("#cake_on_message").val() == '' ? '' : $("#cake_on_message").val();
    var weight = $("#weight" + id + "").val() == '' ? '' : $("#weight" + id + "").val();
    $.ajax({
        url: "/product/add-to-cart",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            quantity: quantity,
            image_path: image_path,
            regular_product_id: id,
            cake_on_message: cake_on_message,
            weight: weight
        },
        datatype: "JSON",
        success: function(data) {
            var total = 0;
            var json_data = Object.values(data.products); //get object data from controller
            for (var i = 0; i < json_data.length; i++) {
                var arr_data = json_data[i];
                total += arr_data.price * arr_data.quantity; //calculate total with click
            }
            dataDisplay(data);
            $(".cart-price").text('Tk.' + total); //display data
            $(".cart-count").text(data.cart_count > 0 ? data.cart_count : 0);
        }
    });
}
//custom product add to cart
//function addToCartCustom(id){
$(".custom_product_addcart").on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData();
    if ($("#printed_cake_id").val() != null) { //photo cake exist
        var image = $("input[type=file]")[0].files[0];
        formData.append('photo_cake', image);
    }
    //for custom product
    formData.append('custom_product_id', $("#custom_product_id").val());
    formData.append('printed_cake_id', $("#printed_cake_id").val());
    formData.append('image_path', $("#image_path").val());
    //formData.append('total_price', $("#total_price").val());
    formData.append('quantity', $("#quantity").val());
    formData.append('size', $("#size").val());
    formData.append('cake_on_message', $("#cake_on_message").val());
    formData.append('flavor', $("#flavor").val());
    formData.append('flavor_tire1', $("#flavor_tire1").val());
    formData.append('flavor_tire2', $("#flavor_tire2").val());
    formData.append('flavor_tire3', $("#flavor_tire3").val());
    $.ajax({
        url: "/product/add-to-cart",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        enctype: 'multipart/form-data',
        success: function(data) {
            var total = 0;
            var json_data = Object.values(data.products); //get object data from controller
            for (var i = 0; i < json_data.length; i++) {
                var arr_data = json_data[i];
                total += arr_data.price * arr_data.quantity; //calculate total with click
            }
            dataDisplay(data);
            $(".cart-price").text('Tk.' + total); //display data
            $(".cart-count").text(data.cart_count > 0 ? data.cart_count : 0);
        }
    });
});
//cake studio add to cart
$(".customs2_product_addcart").on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData();
    if ($("#photo_cake").val() == 'Photo Cake') { //photo cake exist
        var image = $("input[type=file]")[0].files[0];
        formData.append('photo_cake', image);
        formData.append('studio_printed_cake_id', $("#printed_cake_id").val());
    }
    //for custom product
    formData.append('first_layer_sponge', $("input[name=first_layer_sponges1]").val());
    formData.append('second_layer_sponge', $("#second_layer_sponges2").val());
    formData.append('third_layer_sponge', $("#third_layer_sponges3").val());
    formData.append('first_layer_cream', $("#first_layer_creams1").val());
    formData.append('second_layer_cream', $("#second_layer_creams2").val());
    formData.append('fruit_filling_name', $("#fruit_filling_names1").val());
    formData.append('cake_on_message', $("#message_on_cake").val());
    //formData.append('total_price', $("#total_price").val());
    formData.append('quantity', $(".quantity").val());
    formData.append('size', $("#studio_cake_size").val());
    formData.append('image_path', $("#image_path").val());
    formData.append('message_color', $("input[name=message_colors1]").val());
    formData.append('studio_id', $("#studio_id").val());
    $.ajax({
        url: "/product/add-to-cart",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        enctype: 'multipart/form-data',
        success: function(data) {
            var total = 0;
            var json_data = Object.values(data.products); //get object data from controller
            for (var i = 0; i < json_data.length; i++) {
                var arr_data = json_data[i];
                total += arr_data.price * arr_data.quantity; //calculate total with click
            }
            dataDisplay(data);
            $(".cart-price").text('Tk.' + total); //display data
            $(".cart-count").text(data.cart_count > 0 ? data.cart_count : 0);
        },
        error: function(data) {
            console.log(data);
        }
    });
});
//function for get product onload
function getProductOnload() {
    $.ajax({
        url: "/product/price-calculation",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        datatype: "JSON",
        success: function(data) {
            var total = 0;
            var json_data = Object.values(data.products); //get object data from controller
            for (var i = 0; i < json_data.length; i++) {
                var arr_data = json_data[i];
                total += arr_data.price * arr_data.quantity; //calculate total for onload
            }
            dataDisplay(data);
            $(".cart-price").text('Tk.' + total); //display data
            $(".cart-count").text(data.cart_count > 0 ? data.cart_count : 0);
        }
    });
}
//display cart data
function dataDisplay(data) {
    var html = "";
    var total = 0;
    var json_gift = null;
    if (!!data.giftProducts) {
        json_gift = Object.values(data.giftProducts);
    }
    var json_data = Object.values(data.products); //get object data from controller
    if (json_data.length > 0) {
        html += '<div class="products scrollable">';
        for (var i = 0; i < json_data.length; i++) {
            //data store in variable
            var arr_data = json_data[i];
            var weight = '';
            if (arr_data.product_weight != null) {
                weight = arr_data.product_weight;
            }
            html += '<div class="product product-cart">';
            html += '<figure class="product-media overflow-hidden">';
            html += '<a>';
            html += '<img src="/' + arr_data.image_path + '" alt="product" width="80" height="88" />';
            html += '</a>';
            html += '<button class="btn btn-link btn-close product-remove-btn" onclick="productRemove(\'' + arr_data.id + '\')"><i class="fas fa-times"></i><span class="sr-only">Close</span></button>';
            html += '</figure>';
            html += '<div class="product-detail">';
            html += '<a class="product-name">' + arr_data.name + ' ' + weight + '</a>';
            var tempArray = [];
            if (arr_data.is_box_product == 1) {
                for (var j = 0; j < json_gift.length; j++) {
                    tempArray = Object.values(json_gift[j]);
                    for (var k = 0; k < tempArray.length; k++) {
                        var singleProduct = tempArray[k];
                        if (arr_data.is_box_product == 1 && arr_data.product_id == singleProduct.gift_box_id) {
                            if (singleProduct.product_weight != null) {
                                html += '<span class="product d-block">' + singleProduct.quantity + 'Ã— ' + singleProduct.name + ' ' + singleProduct.product_weight + '</span>';
                            } else {
                                html += '<span class="product d-block">' + singleProduct.quantity + 'Ã— ' + singleProduct.name + '</span>';
                            }
                        }
                    }
                }
            }
            html += '<div class="price-box">';
            html += '<span class="product-quantity">' + arr_data.quantity + '</span>';
            html += '<span class="product-price">Tk.' + arr_data.price + '</span>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            //total price calculation
            total += arr_data.price * arr_data.quantity;
        }
        html += '</div>';
        html += '<div class="cart-total"><label>Subtotal:</label><span class="price">Tk.' + total + '</span></div>';
        html += '<div class="cart-action">';
        html += '<a href="/product/cart-view" class="btn btn-dark btn-link">View Cart</a>';
        html += '<a href="/checkout/index" style="background:#4DAE67;border:none" class="btn btn-dark"><span>Go To Checkout</span></a>';
        html += '</div>';
    } else {
        html += '<center style="margin-top:210px;margin-bottom:150px"><img src="/frontend/images/shopping-cart.jpg" width="100" height="100" alt="cart"><h5 class="text-danger">Your Shopping Cart Is Empty !</h5></center>'
    }
    $(".display-cart-product").html(html);
}
//product remove
function productRemove(id) {
    $.ajax({
        url: "/product/remove-cart",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
        },
        datatype: "JSON",
        success: function(data) {
            var total = 0;
            var json_data = Object.values(data.products); //get object data from controller
            for (var i = 0; i < json_data.length; i++) {
                var arr_data = json_data[i];
                total += arr_data.price * arr_data.quantity; //calculate total for onload
            }
            dataDisplay(data);
            //cart view product
            getCartProduct();
            $(".cart-price").text('Tk.' + total); //display data
            $(".cart-count").text(data.cart_count > 0 ? data.cart_count : 0);
        }
    });
}

////////////// cart view product display ///////////
//function for get product onload
function getCartProduct() {
    $.ajax({
        url: "/cart-product/view",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        datatype: "JSON",
        // beforeSend:function(){
        //     var html = '';
        //     html +='<center style="margin-top:200px;margin-bottom:220px"><div class="loading-btn1"><div class="load-div1"></div>';
        //     html +='<div class="load-div1"></div>';
        //     html +='<div class="load-div1"></div>';
        //     html +='<div class="load-div1"></div></div></center>';
        //     $(".view-cart-product").html(html);
        // },
        success: function(data) {
            //call function for display update
            displayCartProduct(data);
        }
    });
}
//display cart product
function displayCartProduct(data) {
    var html = '';
    var total = 0;
    var json_gift = null;
    if (!!data.giftProducts) {
        json_gift = Object.values(data.giftProducts);
    }
    var json_data = Object.values(data.products); //get object data from controller
    if (json_data.length > 0) {
        html += '<div class="step-by pr-4 pl-4">';
        html += '<h3 class="title title-simple title-step active"><a href="/product/cart-view">1. Shopping Cart</a></h3>';
        html += '<h3 class="title title-simple title-step"><a href="/checkout/index">2. Checkout</a></h3>';
        html += '<h3 class="title title-simple title-step"><a style="cursor: pointer;">3. Order Complete</a></h3>';
        html += '</div>';
        html += '<div class="container mt-md-7 mt-3 mb-2">';
        html += '<div class="row">';
        html += '<div class="col-lg-8 col-md-12 pr-lg-4">';
        html += '<table class="shop-table cart-table">';
        html += '<thead><tr>';
        html += '<th><span>Product</span></th>';
        html += '<th></th>';
        html += '<th><span>Price</span></th>';
        html += '<th><span>quantity</span></th>';
        html += '<th>Subtotal</th>';
        html += '</tr></thead>';
        html += '<tbody><tr>';
        html += '<tbody>';
        for (var i = 0; i < json_data.length; i++) {
            //data store in variable
            var arr_data = json_data[i];
            var weight = '';
            if (arr_data.product_weight != null) {
                weight = arr_data.product_weight;
            }
            var quantities = arr_data.quantity;
            html += '<tr><td class="product-thumbnail">';
            html += '<figure>';
            html += '<a>';
            html += '<img src="/' + arr_data.image_path + '" width="100" height="100" alt="product">';
            html += '</a></td>';
            html += '<td class="product-name">';
            html += '<div class="product-name-section">';
            html += '<a>' + arr_data.name + ' ' + weight + '</a>';
            var tempArray = [];
            if (arr_data.is_box_product == 1) {
                for (var j = 0; j < json_gift.length; j++) {
                    tempArray = Object.values(json_gift[j]);
                    for (var k = 0; k < tempArray.length; k++) {
                        var singleProduct = tempArray[k];
                        if (arr_data.is_box_product == 1 && arr_data.product_id == singleProduct.gift_box_id) {
                            if (singleProduct.product_weight != null) {
                                html += '<span class="product d-block">' + singleProduct.quantity + 'Ã— ' + singleProduct.name + ' ' + singleProduct.product_weight + '</span>';
                            } else {
                                html += '<span class="product d-block">' + singleProduct.quantity + 'Ã— ' + singleProduct.name + '</span>';
                            }
                        }
                    }
                }
            }
            html += '</div></td>';
            html += '<td class="product-subtotal">';
            html += '<span class="amount">Tk.' + arr_data.price + '</span></td>';

            html += '<td class="product-quantity">';
            html += '<div class="input-group">';
            html += '<button class="quantity-minus d-icon-minus dec-btn' + arr_data.id + '" onclick="decQuantity(\'' + arr_data.id + '\')"></button>';
            html += '<input class="quantitys2' + arr_data.id + ' form-control" value="' + quantities + '" type="number" min="1" max="1000000" readonly>';
            html += '<button class="quantity-plus d-icon-plus" onclick="incQuantity(\'' + arr_data.id + '\')"></button>';
            html += '</div></td>';

            html += '<td class="product-subtotal">';
            html += '<span class="amount">Tk.' + arr_data.price * quantities + '</span></td>';

            html += '<td class="product-close">';
            html += '<a class="product-remove" style="background:#e5494a;color:white;cursor:pointer" title="Remove this product" onclick="productRemove(\'' + arr_data.id + '\')">';
            html += '<i class="fas fa-times"></i>';
            html += '</a></td>';
            //total price calculation
            total += arr_data.price * quantities;
        }
        html += '</tbody>';
        html += '</table>';
        html += '<div class="cart-actions mb-6 pt-4">';
        html += '<a href="/" style="background:#4DAE67;border:none" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>';
        html += '</div>';
        html += '</div>';
        html += '<aside class="col-lg-4 sticky-sidebar-wrapper">';
        html += '<div class="sticky-sidebar" data-sticky-options="{bottom: 20}">';
        html += '<div class="summary mb-4">';
        html += '<h3 class="summary-title text-left">Cart Totals</h3>';
        html += '<table class="shipping">';
        html += '<tr class="summary-subtotal">';
        html += '<td><h4 class="summary-subtitle">Subtotal</h4></td>';
        html += '<td><p class="summary-subtotal-price">Tk.' + total + '</p></td>';
        html += '</tr></table>';
        html += '<table class="total">';
        html += '<tr class="summary-subtotal">';
        html += '<td><p class="text-left">Delivery charge calculate at checkout.</p></td>';
        html += '</tr></table>';
        html += '<a href="/checkout/index" style="background:#4DAE67;border:none" class="btn btn-dark btn-rounded btn-checkout">Proceed to checkout</a>';
        html += '</div></div></aside>';
        html += '</div></div>';

    } else {
        html += '<center style="margin-top:180px;margin-bottom:150px"><img src="/frontend/images/shopping-cart.jpg" width="100" height="100" alt="cart"><h5 class="text-danger">Your Shopping Cart Is Empty !</h5></center>'
    }
    $(".view-cart-product").html(html);
    $(".cart-price").text('Tk.' + total); //display data
}
//decreament quantity
function decQuantity(id) {
    if ($(".quantitys2" + id).val() > 1) {
        var dec_val = $(".quantitys2" + id).val() - 1;
        $(".quantitys2" + id).val(dec_val);
    } else {
        $(".dec-btn" + id).attr('disabled', true).css({
            'cursor': 'not-allowed'
        });
        var dec_val = $(".quantitys2" + id).val(1);
    }
    $.ajax({
        url: "/cart-product/increament",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            inc_val: dec_val
        },
        datatype: "JSON",
        success: function(data) {
            //call function
            dataDisplay(data);
            //call function for display update
            displayCartProduct(data);
        }
    });
}
//decreament quantity
function incQuantity(id) {
    var inc_val = parseInt($(".quantitys2" + id).val()) + 1;
    $(".quantitys2" + id).val(inc_val);
    $.ajax({
        url: "/cart-product/increament",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            inc_val: inc_val
        },
        datatype: "JSON",
        success: function(data) {
            //call function
            dataDisplay(data);
            //call function for display update
            displayCartProduct(data);
        }
    });
}
//add wishlist
function productWishlist(id) {
    var customer_id = $("#customer_id").val();
    $.ajax({
        url: "/product/add-wishlist",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            customer_id: customer_id
        },
        datatype: "JSON",
        success: function(data) {
            // console.log(data);
            $("#btn-wishlist" + id).css({
                'background': '#4DAE67',
                'color': 'white'
            });
            $("#btn-wishlist" + id).attr('title', 'Remove from wishlist');
            $("#btn-wishlists2").css({
                'color': '#4DAE67'
            });
        }
    });
}
//remove wishlist
function removeWishlist(id) {
    var customer_id = $("#customer_id").val();
    $.ajax({
        url: "/product/remove-wishlist",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            customer_id: customer_id
        },
        datatype: "JSON",
        success: function(data) {
            // console.log(data);
            $("#btn-wishlist" + id).css({
                'background': 'white',
                'color': 'gray'
            });
            $("#btn-wishlist" + id).attr('title', 'Add to wishlist');
            $("#btn-wishlists2").css({
                'color': 'gray'
            });
        }
    });
}
//weight variation product price
function productPriceChange(value, id, discount) {
    var baseUrl = window.location.origin;
    $.ajax({
        url: "/product/weight-wise-price",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            value: value
        },
        datatype: "JSON",
        success: function(data) {
            var priceWithDiscount = data.weight.price - discount;
            $("#priceWithDiscount" + id + "").text('Tk.' + priceWithDiscount);
            $("#onlyPrice" + id + "").text('Tk.' + data.weight.price);
            $(".new_flavor_price").text(priceWithDiscount);
            $("#old_flavor_price").text('Tk.' + data.weight.price);
            $("#weight" + id + "").val(value);
            $("#productWeightImage" + id + "").attr('src', baseUrl + '/' + data.image[0].image_path);
            // console.log(baseUrl+'/'+data.image[0].image_path)
            $("#image_path" + id + "").val(data.image[0].image_path);
            $("#productWeightImage" + id + "").attr('data-zoom-image', baseUrl + '/' + data.image[0].image_path);
            $("#productWeightImage" + id + "").elevateZoom({
                responsive: true,
                zoomWindowFadeIn: 750,
                zoomWindowFadeOut: 500,
                borderSize: 0,
                zoomType: 'inner',
                cursor: 'crosshair'
            });
            $("#productWeightImageThumb" + id + "").attr('src', baseUrl + '/' + data.image[0].image_path);
            if (data.weight.delivery_status == 1) {
                $("#deliveryText" + id + "").css({
                    'background': '#4DAE67',
                    'color': 'white'
                }).text('Same Day Delivery');
            } else {
                $("#deliveryText" + id + "").css({
                    'background': '#5e8167',
                    'color': 'white'
                }).text('Next Day Delivery');
            }
        }
    });
}
