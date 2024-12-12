@extends('layouts.app')
@section('main_content')

<!-- Recreated Gallery Styles Overrides -->
<style>
    .product-gallery {
        display: flex;
        align-items: flex-start;
    }

    .product-thumbs-wrap {
        margin-top: 10px; /* Space between main image and thumbnails */
        padding: 5px;
    }

    .product-thumbs {
        display: flex;
        flex-direction: column; /* Vertically stack the thumbnails */
        gap: 10px; /* Space between thumbnails */
    }

    .product-thumb {
        cursor: pointer;
        border: 1px solid #ddd; /* Optional: border around each thumbnail */
        padding: 5px;
        transition: transform 0.5s ease; /* Optional: smooth transition on hover */
    }

    .product-thumb:hover {
        transform: scale(1.15);
    }

    .product-image {
        border: 1px solid #ddd; /* Optional: border around each thumbnail */
        padding: 10px;
        padding-bottom: 5px;
    }

    #product-main-image-view {
        transition: opacity 0.3s ease-in-out; /* Smooth transition for fading */
    }

    #product-main-image-view.fade {
        opacity: 0;
    }


</style>

<style>
    .price_weight {
        display: flex;
        flex-direction: row;
    }

    .size {
        min-width: 60px;
        min-height: 30px;
        text-align: center;
        border: 1px solid gray;
        border-radius: 5px;
        margin: 5px;
        cursor: pointer;
        text-decoration: none;
        color: black;
        font-size: 1.2rem;
    }

    .size:hover, .size.active {
        border-color: green;   /* Set border color to green on hover or when active */
        color: green;          /* Optional: Change text color to green */
    }
</style>

<!-- main content -->
<main class="pt-8 main single-product display-search-result">
    <div class="pb-6 mb-10 page-content">
        <div class="container">
            <div class="mb-8 product product-single row">
                <meta itemprop="productID" content="{{ $data->id }}" />

                @php
                    $images = json_decode($data->images, true);
                    $sell_price = json_decode($data->sell_price, true);
                    $sell_weight = json_decode($data->sell_weight, true);


                @endphp

                <!-- Image gallery -->
                <div class="col-md-6">
                    <div class="product-gallery row">

                        <!-- Thumbnails Column -->
                        <div class="col-md-2">
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">

                                    <!-- Main Thumbnail -->
                                    <div class="product-thumb active">
                                        <img class="thumbs" src="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}" onclick="updateMainImage(this.src)" alt="{{ $data->name }}">
                                    </div>

                                    <!-- Loop through additional images -->
                                    @foreach ($images as $key=>$image)
                                        <div class="product-thumb">
                                            <img class="thumbs" src="{{ asset('images/products/'.$data->code.'/'.$image) }}" onclick="updateMainImage(this.src)" alt="{{ $data->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Main Image Column -->
                        <div class="col-md-10">
                            <div class="row">
                                <figure class="product-image">
                                    <img itemprop="image" id="product-main-image-view"
                                         src="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}"
                                         data-zoom-image="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}"
                                         onclick="updateMainImage(this.src)"
                                         alt="{{ $data->name }}">
                                </figure>
                                <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-6 sticky-sidebar-wrapper">
                    <div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">

                        <div class="product-navigation">

                            <ul class="breadcrumb breadcrumb-lg">
                                <li><a href="{{ route('front.index') }}"><i class="fa-solid fa-house"></i></a></li>
                                <li><a href="#" class="active"><span class="cst">{{ $cat->category_name }}</span></a></li>

                                @if ($data->subcat_id)
                                    <li><a href="#" class="active"><span class="cst">{{ $subcat->subcat_name }}</span></a></li>
                                @endif

                                <li><span class="cst">{{ $data->name }}</span></li>
                            </ul>

                        </div>

                        <h1 itemprop="name" class="product-name custom-name"><span id="{{ 'product-name-'.($data->code) }}" class="cstb">{{ $data->name }}</span></h1>

                        <input type="hidden" id="flavor_price" name="flavor_price">
                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                        <div itemprop="offers" class="mt-4 product-price cstb" style="font-size: 2.3rem">
                            <span>Tk. <span itemprop="price" id="final_price" class="flavor_price new_flavor_price">{{ $sell_price[0] }}</span></span>
                        </div>

                        <p class="mt-4 product-short-desc cst">{{ $data->short_discription }}</p>

                        @if($cat->id == 18)
                            <div class="product-form product-variations product-color">
                                <label class="cst">Flavor:</label>
                                <div class="select-box">
                                    <select name="flavor" id="flavor" class="form-control" onchange="calculateCustomPrice()" required="">
                                        <option value="" selected="selected" disabled="">Choose an Flavor</option>
                                        <option value="2750">Black Forest</option>
                                        <option value="2800">Chocolate (Belgian Malted)</option>
                                        <option value="2950">Chocolate (Fudge)</option>
                                        <option value="2500">Chocolate (Regular)</option>
                                        <option value="2450">Fantasy</option>
                                        <option value="2800">Pandan</option>
                                        <option value="3555">Red Velvet</option>
                                        <option value="3000">Tiramisu</option>
                                        <option value="2350">Vanilla</option>
                                        <option value="2800">White Forest</option>
                                    </select>
                                </div>
                            </div>

                            <div class="product-form product-variations product-size">
                                <label>Weight:</label>
                                <div class="product-form-group">
                                    <div class="select-box">
                                        <select name="size" id="size" class="form-control" onchange="calculateCustomPrice()" required="">
                                            <option value="" selected="selected" disabled="">Choose an Option</option>
                                            <option value="1">1 KG</option>
                                            <option value="1.5">1.5 KG</option>
                                            <option value="2">2 KG</option>
                                            <option value="2.5">2.5 KG</option>
                                            <option value="3">3 KG</option>
                                            <option value="3.5">3.5 KG</option>
                                            <option value="4">4 KG</option>
                                            <option value="4.5">4.5 KG</option>
                                            <option value="5">5 KG</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="product-form product-size">
                                <div class="product-form-group">
                                    <div class="price_weight">
                                        @foreach ($sell_price as $sub_key => $price)
                                            <a class="size {{ ($sub_key == 0) ? 'active' : '' }}"
                                            id="{{ 'wp-'.$price }}"
                                            onclick="onProductWeightChange('{{ 'wp-'.$price }}', {{ $price }}, 'final_price')">
                                                <span class="cst">
                                                    {{ \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key]) }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif



                        @if($data->cat_id == 3)
                            <div class="product-form product-variations product-color">
                                <div class="mb-5 col-md-9 col-9">
                                    <label class="cstb">Message On Cake</label><span class="cst"> (<i>Max 30</i>)</span>
                                    <textarea maxlength="30" id="cake_on_message" class="form-control" cols="3" rows="1" name="cake_on_message"></textarea>
                                </div>
                            </div>
                        @endif

                        <hr class="product-divider">

                        <div class="product-form product-qty">
                            <div class="product-form-group">
                                <div class="mr-2 input-group">
                                    <button class="quantity-minus fa-solid fa-minus"></button>
                                    <input id="{{ 'product-quantity-'.($data->code) }}" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                    <button class="quantity-plus fa-solid fa-plus"></button>
                                </div>

                                @if($data->status == 1)
                                    <button style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}', true)" class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold">
                                        <span class="cstb">Add to Cart</span>
                                    </button>
                                @else
                                    <button style="cursor:pointer;background:#bd5353" class="btn-product out-of-stock text-normal ls-normal font-weight-semi-bold">
                                        <span class="stock-span cstb">Not Available</span>
                                    </button>
                                @endif

                            </div>
                        </div>

                        <hr class="mb-3 product-divider">
                    </div>
                </div>
            </div>

            <div class="mb-4 tab tab-nav-simple product-tabs">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#product-tab-description"><span class="cstb">Description</span></a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active in" id="product-tab-description">
                        <div class="mt-6 row">
                            <div class="col-md-12">
                                <p class="mb-2">
                                    <p class="cstb" style="font-size: 2rem">About Product</p>
                                    <div class="cst" style="font-size: 1.5rem">{!! $data->discription !!}</div>

                                    <br><br>

                                    <p class="cstb" style="font-size: 2rem">Ingredients</p>
                                    <p class="cst" style="font-size: 1.5rem">{!! $data->ingredients !!}</p>
                                </p>
                        </div>
                    </div>
                </div>
            </div>

            <section class="pt-3 mt-10">
                <h2 class="title justify-content-center cstb">Related Products</h2>

                <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                        'items': 5,
                        'nav': false,
                        'loop': false,
                        'dots': true,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">

                    <!-- Dynamicly Loads Related Products -->
                    @foreach ($related as $key => $data)
                        @php
                            $images = json_decode($data->images, true);
                            $sell_price = json_decode($data->sell_price, true);
                            $sell_weight = json_decode($data->sell_weight, true);

                            $new = \Carbon\Carbon::parse($data->created_at)->gt(\Carbon\Carbon::now()->subDays(2));
                        @endphp
                        <div class="text-center product product-with-qty">
                            <figure class="product-media">
                                <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                    <!-- thumbnail -->
                                    <img data-src="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">

                                    <!-- Additional image -->
                                    <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                </a>

                                @if ($data->delivery_type == 1)
                                    <p style="background:#4DAE67;color:white"><span class="cst">Same Day Delivery</span></p>
                                @else
                                    <p style="background:#5e8167;color:white" id="deliveryText188"><span class="cst">Next Day Delivery</span></p>
                                @endif

                                <!-- Shows new banner if created within 2 days -->
                                @if ($new)
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                @endif
                            </figure>

                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="{{ route('front-product.index', ['code' => $data->code]) }}"><span class="cst">{{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}</span></a>
                                </h3>

                                <div class="product-price">
                                    <ins id="{{ 'product-price-'.($data->code) }}" class="new-price"><span class="cstb">{{ 'Tk. '.$sell_price[0] }}</span></ins>
                                </div>


                                @if ($data->status == 1)
                                    <div class="product-action">

                                        @if($data->unit_type == 0)
                                            <div class="product-quantity">
                                                <button class="quantity-minus fa-solid fa-minus"></button>
                                                <input id="{{ 'product-quantity-'.($data->code) }}" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                                <button class="quantity-plus fa-solid fa-plus"></button>
                                            </div>
                                        @else
                                            <div class="product-quantity">
                                                <select id="{{ 'product-quantity-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                    @foreach ($sell_price as $sub_key => $price)
                                                        <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                        \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <a style="cursor:pointer" onclick="addToCart(0)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                            <span class="cst">Add to cart</span>
                                        </a>
                                    </div>
                                @else
                                    <div class="product-action">
                                        <!-- if not available -->
                                        <a style="cursor:pointer;background:#bd5353" class="btn-product out-of-stock" title="Add to cart">
                                            <span class="stock-span cst">Not Available</span>
                                        </a>
                                    </div>
                                @endif


                            </div>
                        </div>
                    @endforeach

                </div>

            </section>
        </div>
    </div>
</main>
<!-- End of Main -->


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all thumbnail images inside the product-thumb div
        const thumbnails = document.querySelectorAll('.product-thumb img');

        // Add a click event listener to each thumbnail
        thumbnails.forEach((thumbnail) => {
            thumbnail.addEventListener('click', function () {
                // Find the main image element
                const mainImage = document.getElementById('product-main-image-view');

                // Add a fade-out class before changing the image
                mainImage.classList.add('fade');

                // Wait for the fade-out transition to complete before changing the image
                setTimeout(() => {
                    mainImage.src = this.src;
                    mainImage.setAttribute('data-zoom-image', this.src);

                    // Remove fade-out class and add fade-in class
                    mainImage.classList.remove('fade');
                }, 300); // Match the fade duration in CSS

                // Remove active class from all thumbnails
                document.querySelectorAll('.product-thumb').forEach(thumb => thumb.classList.remove('active'));

                // Add active class to the clicked thumbnail's parent div
                this.parentElement.classList.add('active');
            });
        });
    });
</script>


<script>
    function onProductWeightChange(selfID, value, tagID) {
        const tag = document.getElementById(tagID);
        const self = document.getElementById(selfID);

        if (tag) {
            tag.innerHTML = value;
        } else {
            console.warn(`Element with ID "${tagID}" not found.`);
        }

        document.querySelectorAll('.size').forEach(thumb => thumb.classList.remove('active'));
        self.classList.add('active');
    }
</script>


<script>
    function calculateCustomPrice() {
        const flavor = document.getElementById('flavor');
        const size = document.getElementById('size');

        const price = flavor.value * size.value;


        const tag = document.getElementById('final_price')
        tag.innerHTML = price;
    }
</script>



<script>
    function onProductPriceChange(value, insTagId) {
        const insTag = document.getElementById(insTagId);

        if (insTag) {
            insTag.innerHTML = '<span class="cstb"> Tk. ' + value + '</span>';
        } else {
            console.warn(`Element with ID "${insTagId}" not found.`);
        }
    }
</script>



@endsection
