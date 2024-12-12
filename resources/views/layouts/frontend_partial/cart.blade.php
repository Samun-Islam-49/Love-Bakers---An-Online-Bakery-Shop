<script>
    function add_to_cart(code, main = false) {
        var name = $("#product-name-" + code).text().trim() || 'Unknown Product';
        var image_path = $("#product-image-" + code).val();
        var quantity = $("#product-quantity-" + code).val() || "1";
        var delivery_type = $("#product-delivery-type-" + code).val() || "0";
        var weight = $("#product-weight-" + code + " option:selected").text().trim() || '';
        var price = $("#product-price-" + code).text().trim();
        var cake_on_message = "";

        if(main) {
            var weight = $('a.size.active span').text().trim();
            var price = $("#final_price").text().trim();
            var cake_on_message = $("#cake_on_message").val() || "";
        }


        if (weight !== '') {
            name += ' ' + weight;
        }

        price = parseInt(price.replace(/[^\d]/g, ''), 10);
        quantity = parseInt(quantity.replace(/[^\d]/g, ''), 10);
        var total_price = price * quantity;

        var id = Date.now().toString(36) + Math.random().toString(36).substr(2, 9);


        var productHTML = `
        <div id="${id}" class="product product-cart">
            <figure class="overflow-hidden product-media">
                <a><img src="${image_path}" alt="product" width="80" height="88"></a>
                <button class="btn btn-link btn-close product-remove-btn" onclick="remove_from_cart('${id}')">
                    <i class="fas fa-times"></i>
                    <span class="sr-only">Close</span>
                </button>
            </figure>
            <div class="product-detail">
                <a class="product-name"><span class="cst">${name}</span></a>
                <div class="price-box">
                    <span class="product-quantity cst">${quantity}</span>
                    <span class="product-price cst" style="font-weight: normal;">Tk.${price}</span>
                </div>
            </div>
        </div>
        `;

        // Create cart item object
        var cartItem = {
            cart_id: id,
            code: code,
            name: name,
            image: image_path,
            message: cake_on_message,
            quantity: quantity,
            weight: weight,
            price: price,
            total: total_price,
            delivery: delivery_type
        };

        $.ajax({
            url: "{{ route('cart.add') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: "{{ csrf_token() }}",
                cartItem: cartItem
            },
            success: function (response) {
                console.log('Success: ', response);
                document.querySelector(".cart-product-container").innerHTML += productHTML;
                update_cart_count(response.curt_count);
                update_cart_total(response.total_price);

                if (response.curt_count > 0) {
                    display_cart_footer(true);
                }
            },
            error: function (xhr) {
                console.error('Error: ', xhr.responseText);
            }
        });


        // Debugging output
        console.log("--- Product Details ---");
        console.log("ID:", id);
        console.log("Name:", name);
        console.log("Message:", cake_on_message);
        console.log("Weight:", weight);
        console.log("Image Path:", image_path);
        console.log("Quantity:", quantity);
        console.log("Price:", price);
        console.log("Total Price:", total_price);

        // Further processing...
    }

    function load_cart() {
        // Send an AJAX request to fetch cart items
        $.ajax({
            url: "{{ route('cart.load') }}",
            method: 'GET',
            success: function (response) {
                if (response.success) {
                    // Clear existing cart items
                    $('.cart-product-container').html('');

                    console.log("Response Data:", response.data);
                    console.log("Data Type:", typeof response.data);

                    // Add each product to the cart
                    response.data.forEach(function (product) {
                        var productHTML = `
                            <div id="${product.cart_id}" class="product product-cart">
                                <figure class="overflow-hidden product-media">
                                    <a><img src="${product.image}" alt="product" width="80" height="88"></a>
                                    <button class="btn btn-link btn-close product-remove-btn" onclick="remove_from_cart('${product.cart_id}')">
                                        <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a class="product-name"><span class="cst">${product.name}</span></a>
                                    <div class="price-box">
                                        <span class="product-quantity cst">${product.quantity}</span>
                                        <span class="product-price cst" style="font-weight: normal; padding: 5px;">Tk. ${product.price}</span>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('.cart-product-container').append(productHTML);
                    });

                    update_cart_count(response.data.length);
                    update_cart_total(response.total_price);

                    if(response.data.length > 0) {
                        display_cart_footer(true);
                    } else {
                        display_cart_footer(false);
                    }

                }
                else {
                    console.error('Error loading cart:', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Failed to load cart:', error);
            }
        });
    }

    // Call the function when the page is fully loaded
    $(document).ready(function () {
        load_cart();
    });


    function remove_from_cart(itemId, callback) {
        var cartItem = document.getElementById(itemId);

        $.ajax({
            url: "{{ route('cart.remove') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                item_id: itemId
            },
            success: function(response) {
                console.log('Item removed from the cart');

                cartItem.remove();
                update_cart_count(response.curt_count);
                update_cart_total(response.total_price);

                if(response.curt_count == 0) {
                    display_cart_footer(false);
                }

                // Call the callback function (e.g., to remove the item from the DOM)
                if (typeof callback === "function") {
                    callback();
                }
            },
            error: function(xhr, status, error) {
                console.log('Error removing item from cart:', error);
            }
        });
    }

    function update_cart_item(cart_id, quantity, total, callback) {
        $.ajax({
            url: "{{ route('cart.update') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                cart_id: cart_id,
                quantity: quantity,
                total: total
            },
            success: function(response) {
                console.log('Item updtaed');

                load_cart();

                if (typeof callback === "function") {
                    callback();
                }
            },
            error: function(xhr, status, error) {
                console.log('Error updating cart item:', error);
            }
        });
    }



    function update_cart_count(count) {
        $(".cart-count").text(count);
    }

    function update_cart_total(price) {
        $(".cart-price").text('Tk. ' + price);
    }

    function display_cart_footer(display) {
        if(display) {
            $('.cart-footer').show();
        } else {
            $('.cart-footer').hide();
        }
    }

</script>
