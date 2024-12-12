@extends('layouts.app')
@section('main_content')
<main class="main home display-search-result">
    <div class="page-content">
        <!-- Image slider for large screen -->
        <section class="intro-section d-none d-md-block">
            <div class="owl-carousel owl-theme row owl-nav-fade intro-slider animation-slider cols-1 gutter-no" data-owl-options='{
                "dots": false,
                "loop": true,
                "items": 1,
                "autoplay": true,
                "autoplayTimeout": 5000,
                "lazyLoad": true
            }'>

                <a href="#">
                    <div class="intro-slide1 banner banner-fixed" style="background-color: #f6f6f6;">

                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-1.jpeg') }}" alt="" width="1903" height="530" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->

                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="intro-slide2 banner banner-fixed" style="background-color: #f6f6f6;">
                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-2.jpeg') }}" alt="" width="1903" height="530" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->
                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="intro-slide2 banner banner-fixed" style="background-color: #f6f6f6;">
                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-3.jpeg') }}" alt="" width="1903" height="530" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->
                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="intro-slide2 banner banner-fixed" style="background-color: #f6f6f6;">
                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-4.jpeg') }}" alt="" width="1903" height="530" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->
                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </section>
        <!-- end Image slider for large screen -->

        <!-- Image slider for small screen -->
        <section class="intro-section d-block d-md-none">
            <div class="owl-carousel owl-theme row owl-nav-fade intro-slider animation-slider cols-1 gutter-no" data-owl-options="{
                'dots': false,
                'loop': true,
                'items': 1,
                'autoplay': true,
                'autoplayTimeout': 5000,
                'lazyLoad': true
            }">
                <a href="#">
                    <div class="intro-slide1 banner banner-fixed" style="background-color: #f6f6f6;">

                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-1.jpeg') }}" alt="" width="700" height="350" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->

                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="intro-slide2 banner banner-fixed" style="background-color: #f6f6f6;">

                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-2.jpeg') }}" alt="" width="700" height="350" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->

                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="intro-slide2 banner banner-fixed" style="background-color: #f6f6f6;">

                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-3.jpeg') }}" alt="" width="700" height="350" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->

                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="intro-slide2 banner banner-fixed" style="background-color: #f6f6f6;">

                        <!-- <figure> -->
                        <img class="slider-images lozad owl-lazy" data-src="{{ asset('images/homepage/banner-4.jpeg') }}" alt="" width="700" height="350" style="background-color: #f6f6f6;" />
                        <!-- </figure> -->

                        <div class="container">
                            <div class="banner-content y-50">
                                <h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                    <!--  -->
                                </h4>
                                <h2 class="mb-1 banner-title slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <strong class="d-block text-uppercase">
                                        <!--  -->
                                    </strong>
                                </h2>
                                <p class="slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                    <!--   -->
                                    <span class="text-secondary">
                                        <!-- $99.00 -->
                                    </span>
                                </p>
                                <!-- <a href="" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Order
                                    Now<i class="d-icon-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </section>
        <!-- end Image slider for small screen -->

        <!-- Ribon Slider -->
        <section class="mt-4 service-section mt-md-6 mt-sm-5">
            <div class="container appear-animate">
                <div class="service-list">
                    <div class="service-carousel owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                            'items': 3,
                            'nav': false,
                            'dots': false,
                            'loop': true,
                            'autoplay': true,
                            'autoplayTimeout': 5000,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '576': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3,
                                    'loop': false,
                                    'autoplay': false
                                }
                            }
                        }">

                        <div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'delay': '.3s'
                            }">
                            <i class="icon-box-icon fa-regular fa-circle-check" style="font-size: 38px;"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title cstb">
                                    No Added Preservatives
                                </h4>
                                <p class="mb-0 cst">Premium Ingredients</p>
                            </div>
                        </div>

                        <div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'delay': '.4s'
                            }">
                            <i class="icon-box-icon fa-regular fa-heart"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title cstb">Freshly Baked
                                </h4>
                                <p class="mb-0 cst">Everyday</p>
                            </div>
                        </div>

                        <div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'delay': '.5s'
                            }">
                            <i class="icon-box-icon fa-solid fa-shield-halved"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title cstb">100% Secure Payment
                                </h4>
                                <p class="mb-0 cst">We ensure secure payment!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Ribon Slider -->

        <!-- Featured Product Section -->
        <section class="container pt-2 pb-1 mt-1 mb-1 products-wrapper mt-md-10 mt-sm-3 pb-md-4 mb-md-4 mb-sm-2 pb-sm-2 appear-animate">

            <div class="tab tab-nav-simple tab-nav-center">
                <ul class="nav nav-tabs cstb" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#best-sellers">Daily Needs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#new-arrivals">Cakes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#featured">Cookies</a>
                    </li>
                </ul>


                <div class="tab-content">

                    <!-- Daily Needs -->
                    <div class="tab-pane active" id="best-sellers">
                        <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                                'items': 4,
                                'nav': false,
                                'dots': false,
                                'margin': 20,
                                'loop': false,
                                'autoplay': false,
                                'autoplayTimeout': 3000,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    }
                                }
                            }">

                            <!-- Dynamicly Loads Products of daily needs -->
                            @foreach ($daily_needs as $key => $data)
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
                                            <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">

                                            <!-- Additional image -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                        </a>

                                        @if ($data->delivery_type == 1)
                                            <p style="background:#4DAE67;color:white"><span class="cst">Same Day Delivery</span></p>
                                        @else
                                            <p style="background:#5e8167;color:white"><span class="cst">Next Day Delivery</span></p>
                                        @endif

                                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                                        <!-- Shows new banner if created within 2 days -->
                                        @if ($new)
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                        @endif
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                                        <select id="{{ 'product-weight-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                            @foreach ($sell_price as $sub_key => $price)
                                                                <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                                \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                                <a style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}')" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
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


                            {{-- <div class="text-center product product-with-qty">

                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/MilkBread16383471534uVwd.jpg" class="lozad" alt="Milk Bread" width="300" height="338">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/MilkBread1638347153aC3GU.jpg" class="lozad" alt="Milk Bread" width="300" height="338">
                                    </a>
                                    <input type="hidden" value="#" id="image_path1" name="image_path">
                                    <p style="background:#4DAE67;color:white">Same Day Delivery</p>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Milk Bread</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.150</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity1" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(1)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center product product-with-qty">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/MultiGrainBread400gm1612240926jvVMi.jpg" class="lozad" alt="Multigrain Bread 400 gm" width="300" height="338">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/MultiGrainBread400gm1638348702KlGDV.jpg" class="lozad" alt="Multigrain Bread 400 gm" width="300" height="338">
                                    </a>

                                    <input type="hidden" value="Ecom/Product/MultiGrainBread400gm1638348702KlGDV.jpg" id="image_path85" name="image_path">
                                    <p style="background:#4DAE67;color:white">Same Day Delivery</p>

                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="https://breadandbeyondbd.com/regular-product/multigrain-bread-400-gm">Multigrain Bread 400 gm</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Tk.230</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity1" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(1)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- More Products Here --->

                            <div class="text-center product product-with-qty">

                                <figure class="product-media view-all-link">
                                    <a href="{{ route('front-product.all-index', ['slug' => 'daily-needs']) }}">
                                        <img src="{{ asset('images/homepage/transparent.gif') }}" style="border:none;" width="300" height="338"/>
                                        <figcaption class="cst">View All &nbsp; <i class="fa-solid fa-arrow-right"></i></figcaption>
                                    </a>
                                </figure>

                            </div>
                        </div>
                    </div>

                    <!-- Cakes -->
                    <div class="tab-pane" id="new-arrivals">
                        <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                                'items': 4,
                                'nav': false,
                                'dots': false,
                                'margin': 20,
                                'loop': false,
                                'autoplay': false,
                                'autoplayTimeout': 3000,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    }
                                }
                            }">

                            <!-- Dynamicly Loads Products of daily needs -->
                            @foreach ($cakes as $key => $data)
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

                                            <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">

                                            <!-- Additional image -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                        </a>

                                        @if ($data->delivery_type == 1)
                                            <p style="background:#4DAE67;color:white"><span class="cst">Same Day Delivery</span></p>
                                        @else
                                            <p style="background:#5e8167;color:white"><span class="cst">Next Day Delivery</span></p>
                                        @endif

                                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                                        <!-- Shows new banner if created within 2 days -->
                                        @if ($new)
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                        @endif
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                                        <select id="{{ 'product-weight-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                            @foreach ($sell_price as $sub_key => $price)
                                                                <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                                \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                                <a style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}')" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
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

                            {{-- <div class="text-center product product-with-qty">

                                <figure class="product-media">
                                    <a href="#">
                                        <img src="https://breadandbeyondbd.com/Ecom/Product/1652090784tIEjj.jpg" class="lozad" alt="Black Forest Cake - A" width="300" id="productWeightImage188" height="338">
                                    </a>
                                    <input type="hidden" value="Ecom/Product/1652090784tIEjj.jpg" id="image_path188" name="image_path">
                                    <p style="background:#5e8167;color:white" id="deliveryText188">Next Day Delivery</p>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Black Forest Cake - A</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price" id="onlyPrice188">Tk.1670</ins>
                                        <input type="hidden" id="quantity188" class="quantity form-control" value="1">
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity1" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(1)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center product product-with-qty">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="https://breadandbeyondbd.com/Ecom/Product/1656488331DO2t6.jpg" class="lozad" alt="Choco Dripping Vanilla Cake" width="300" id="productWeightImage215" height="338">
                                    </a>
                                    <input type="hidden" value="Ecom/Product/1656488331DO2t6.jpg" id="image_path215" name="image_path">
                                    <p style="background:#5e8167;color:white" id="deliveryText215">Next Day Delivery</p>

                                    <!-- if new -->
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="https://breadandbeyondbd.com/regular-product/choco-dripping-vanilla-cake">Choco Dripping Vanilla Cake</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price" id="onlyPrice215">Tk.1425</ins>
                                        <input type="hidden" id="quantity215" class="quantity form-control" value="1">
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity1" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(1)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- More products here -->

                            <div class="text-center product product-with-qty">

                                <figure class="product-media view-all-link">
                                    <a href="{{ route('front-product.all-index', ['slug' => 'cakes']) }}">
                                        <img src="{{ asset('images/homepage/transparent.gif') }}" style="border:none;" width="300" height="338"/>
                                        <figcaption class="cst">View All &nbsp; <i class="fa-solid fa-arrow-right"></i></figcaption>
                                    </a>
                                </figure>

                            </div>
                        </div>
                    </div>

                    <!-- Cookies -->
                    <div class="tab-pane" id="featured">
                        <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                                'items': 4,
                                'nav': false,
                                'dots': false,
                                'margin': 20,
                                'loop': false,
                                'autoplay': false,
                                'autoplayTimeout': 3000,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    }
                                }
                            }">

                            <!-- Dynamicly Loads Products of cookies -->
                            @foreach ($cookies as $key => $data)
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

                                            <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">

                                            <!-- Additional image -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                        </a>

                                        @if ($data->delivery_type == 1)
                                            <p style="background:#4DAE67;color:white"><span class="cst">Same Day Delivery</span></p>
                                        @else
                                            <p style="background:#5e8167;color:white"><span class="cst">Next Day Delivery</span></p>
                                        @endif

                                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                                        <!-- Shows new banner if created within 2 days -->
                                        @if ($new)
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                        @endif
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                                        <select id="{{ 'product-weight-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                            @foreach ($sell_price as $sub_key => $price)
                                                                <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                                \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                                <a style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}')" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
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

                            {{-- <div class="text-center product product-with-qty">
                                <figure class="product-media">
                                    <a href="https://breadandbeyondbd.com/regular-product/dark-chocolate-biscuit">
                                        <img src="https://breadandbeyondbd.com/Ecom/Product/1652095658EvuTE.jpg" class="lozad" alt="Dark Chocolate Biscuit" width="300" id="productWeightImage24" height="338">
                                    </a>
                                    <input type="hidden" value="Ecom/Product/1652095658EvuTE.jpg" id="image_path24" name="image_path">
                                    <p style="background:#4DAE67;color:white" id="deliveryText24">Same Day Delivery</p>

                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="https://breadandbeyondbd.com/regular-product/dark-chocolate-biscuit">Dark Chocolate Biscuit</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price" id="onlyPrice24">Tk.300</ins>
                                        <input type="hidden" id="quantity24" class="quantity form-control" value="1">
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity1" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(1)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="text-center product product-with-qty">

                                <figure class="product-media view-all-link">
                                    <a href="{{ route('front-product.all-index', ['slug' => 'cookies']) }}">
                                        <img src="{{ asset('images/homepage/transparent.gif') }}" style="border:none;" width="300" height="338"/>
                                        <figcaption class="cst">View All &nbsp; <i class="fa-solid fa-arrow-right"></i></figcaption>
                                    </a>
                                </figure>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Featured Product Section -->

        <!-- Featured Banner Section -->
        <section class="banners-section">
            <div class="container">
                <div class="row">

                    <!-- Cake Studio -->
                    <div class="col-md-7">
                        <a href="#">
                            <div class="mb-4 banner banner1 banner-fixed overlay-zoom" style="background-color: #F7F7F7">
                                <figure>
                                    <img data-src="{{ asset('images/homepage/lozad/lozad-2.jpg') }}" class="lozad" alt="banner" width="680" height="305">
                                </figure>
                                <div class="banner-content y-50" id="banner1">
                                    <h4 class="banner-subtitle">
                                        <!-- . -->
                                    </h4>
                                    <h3 class="mb-6 banner-title text-uppercase font-weight-bold">
                                        <!-- Digital cake studio -->
                                    </h3>
                                    <!-- <a href="/cake/studio" class="btn btn-sm btn-rounded btn-outline btn-primary">Order
                                    now</a> -->
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Photo Cake -->
                    <div class="col-md-5">
                        <a href="{{ route('front-product.all-index', ['slug' => 'photo-cakes']) }}">
                            <div class="mb-4 banner banner2 banner-fixed overlay-zoom" style="background-color: #F7F7F7">
                                <figure>
                                    <img data-src="{{ asset('images/homepage/lozad/lozad-4.jpg') }}" class="lozad" alt="banner" width="680" height="305">
                                </figure>
                                <div class="banner-content y-50" id="banner2">
                                    <h4 class="banner-subtitle">
                                        <!-- . -->
                                    </h4>
                                    <h3 class="mb-6 banner-title text-uppercase font-weight-bold">
                                        <!-- brownie -->
                                    </h3>
                                    <!-- <a href="/custom/photo-cakes" class="btn btn-sm btn-rounded btn-outline btn-primary">Order
                                    now</a> -->
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Gift Box -->
                    <div class="col-md-5">
                        <a href="#">
                            <div class="mb-4 banner banner3 banner-fixed overlay-zoom" style="background-color: #F7F7F7">
                                <figure>
                                    <img data-src="{{ asset('images/homepage/lozad/lozad-3.jpg') }}" class="lozad" alt="banner" width="680" height="305">
                                </figure>
                                <div class="banner-content y-50" id="banner3">
                                    <h4 class="banner-subtitle">
                                        <!-- . -->
                                    </h4>
                                    <h3 class="mb-6 banner-title text-uppercase font-weight-bold">
                                        <!-- Fruit cake -->
                                    </h3>
                                    <!-- <a href="/build/gift/box" class="btn btn-sm btn-rounded btn-outline btn-primary">Order
                                    now</a> -->
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Custom Cake -->
                    <div class="col-md-7">
                        <a href="{{ route('front-product.all-index', ['slug' => 'customized-cakes']) }}">
                            <div class="mb-4 banner banner4 banner-fixed overlay-zoom" style="background-color: #F7F7F7">
                                <figure>
                                    <img data-src="{{ asset('images/homepage/lozad/lozad-1.jpg') }}" class="lozad" alt="banner" width="680" height="305">
                                </figure>
                                <div class="banner-content y-50" id="banner4">
                                    <h4 class="banner-subtitle">
                                        <!-- . -->
                                    </h4>
                                    <h3 class="mb-6 banner-title text-uppercase font-weight-bold">
                                        <!-- Custom Cake Studio -->
                                    </h3>
                                    <!-- <a href="/custom/exclusive-design-cakes" class="btn btn-sm btn-rounded btn-outline btn-primary">Order
                                    now</a> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Featured Banner Section -->


        <!-- Best selling Section -->
        <section class="container mt-5 mb-6 products-wrapper mt-md-10 mt-sm-7 pb-lg-4 mb-md-8 customized-cake">

            <div class="mb-4 title-wrapper">
                <h2 class="mb-0 title title-underline cstb">Best Selling Customized Cake</h2>
                <a href="#" class="btn btn-link"> <span class="cst">View All</span> <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                    'items': 4,
                    'nav': false,
                    'dots': false,
                    'margin': 20,
                    'loop': false,
                    'autoplay': false,
                    'lazyLoad': true,
                    'autoplayTimeout': 3000,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        }
                    }
                }">

                <!-- Dynamicly Loads Products of Exclusive cakes -->
                @foreach ($ex_cake as $key => $data)
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
                                <p style="background:#5e8167;color:white"><span class="cst">Next Day Delivery</span></p>
                            @endif

                            <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

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


                            @if ($data->status == 1)
                                <div class="mt-3 product-action">
                                    <a href="{{ route('front-product.index', ['code' => $data->code]) }}" class="btn-cart btn-order" title="Select Options">
                                        <span class="cst">Order Now</span>
                                    </a>
                                </div>
                            @else
                                <div class="mt-3 product-action">
                                    <!-- if not available -->
                                    <a style="cursor:pointer;background:#bd5353" class="btn-product out-of-stock" title="Add to cart">
                                        <span class="stock-span cst">Not Available</span>
                                    </a>
                                </div>
                            @endif


                        </div>
                    </div>
                @endforeach

                {{-- <div class="text-center product product-with-qty">

                    <div class="product-details">

                        <h3 class="product-name">
                            <a href="#">Toy Train Cake</a>
                        </h3>

                        <div class="mt-3 product-action">
                            <a href="#" class="btn-cart btn-order" title="Select Options"><span>Order Now</span></a>
                        </div>

                    </div>

                </div>

                <div class="text-center product product-with-qty">
                    <figure class="product-media">

                        <a href="#">
                            <img src="https://breadandbeyondbd.com/Ecom/Cake/ClassicWhiteCake1639030071UU9Os.jpg" alt="" width="300" height="338">
                        </a>

                        <p style="background:#5e8167;color:white">Next Day Delivery</p>

                    </figure>

                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="#">Classic White Cake</a>
                        </h3>

                        <div class="mt-3 product-action">
                            <a href="#" class="btn-cart btn-order" title="Select Options"><span>Order Now</span></a>
                        </div>
                    </div>

                </div> --}}

                <div class="text-center product product-with-qty">

                    <figure class="product-media view-all-link">
                        <a href="{{ route('front-product.all-index', ['slug' => 'exclusive-cakes']) }}">
                            <img src="{{ asset('images/homepage/transparent.gif') }}" style="border:none;" width="300" height="338"/>
                            <figcaption class="cst">View All &nbsp; <i class="fa-solid fa-arrow-right"></i></figcaption>
                        </a>
                    </figure>

                </div>
            </div>
        </section>
        <!-- end Best selling Section -->


        <!-- Store front -->
        <section class="mt-6 banner-big-section" style="background-color: #444;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <figure class="banner-media">
                            <img data-src="{{ asset('images/homepage/store-front.jpeg') }}" class="lozad" alt="Banner Shop" width="627" height="342">
                        </figure>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <h4 class="mb-5 text-white cst">Opens Daily - 7:00AM - 10:00PM</h4>
                            <h3 class="mb-4 text-white banner-title cstb">Freshly baked Everyday</h3>
                            <!-- <p class="mb-5 text-white">Free Shipping on all Products over <span
                                    class="text-secondary">$99.00</span></p> -->
                            <a href="{{ route('front-product.all-index', ['slug' => 'all']) }}" class="mb-4 btn btn-md visit-store btn-rounded btn-primary d-flex align-items-center justify-content-center">
                                <span class="cst">VISIT OUR CATALOGUE</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Store front -->

        <!-- Column Products -->
        <section class="container mt-8 products-wrapper mt-md-10 mt-sm-9 pt-lg-4">
            <div class="row">

                <!-- Quick bites column -->
                <div class="mb-4 col-md-4">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter',
                            'delay': '.5s'
                        }">

                        <div class="mb-4 title-wrapper">
                            <h2 class="mb-0 title title-underline cstb">Quick Bites</h2>
                            <div class="mb-4 title-wrapper">
                                <a href="{{ route('front-product.all-index', ['slug' => 'savory']) }}" class="btn btn-link"><i class="fa-solid fa-caret-left"></i> &nbsp; <span class="cst">View All</span> </a>
                            </div>
                        </div>

                        <div class="products-col">

                            <!-- Dynamicly Loads Products of quick bytes -->
                            @foreach ($savory as $key => $data)
                                @php
                                    $images = json_decode($data->images, true);
                                    $sell_price = json_decode($data->sell_price, true);
                                    $sell_weight = json_decode($data->sell_weight, true);

                                    $new = \Carbon\Carbon::parse($data->created_at)->gt(\Carbon\Carbon::now()->subDays(2));
                                @endphp
                                <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                    <figure class="product-media">
                                        <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                            <!-- thumbnail -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">

                                            <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">

                                            <!-- Additional image -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                        </a>

                                        @if ($data->delivery_type == 1)
                                            <p style="background:#4DAE67;color:white;font-size:11px;text-align:center"><span class="cst">Same Day Delivery</span></p>
                                        @else
                                            <p style="background:#5e8167;color:white;font-size:11px;text-align:center"><span class="cst">Next Day Delivery</span></p>
                                        @endif

                                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                                        <!-- Shows new banner if created within 2 days -->
                                        @if ($new)
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                        @endif
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                                        <select id="{{ 'product-weight-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                            @foreach ($sell_price as $sub_key => $price)
                                                                <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                                \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                                <a style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}')" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
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

                            {{-- <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChickenSandwichDouble1638348474EW8Hq.jpg" alt="Chicken Sandwich Double 85gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChickenSandwichDouble1638348474f0BUD.jpg" alt="Chicken Sandwich Double 85gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/ChickenSandwichDouble1638348474f0BUD.jpg" id="image_path65" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Chicken Sandwich Double 85gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.230</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                            <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChickenPuffPatties80gm1638350275VYv0T.jpg" alt="Chicken Puff Patties 80gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                            <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChickenPuffPatties80gm1638350275AxsqC.jpg" alt="Chicken Puff Patties 80gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/ChickenPuffPatties80gm1638350275AxsqC.jpg" id="image_path134" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Chicken Puff Patties 80gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.150</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/RingPuff100gm16383498611KoKB.jpg" alt="Ring Puff 100gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/RingPuff100gm1638349861ECT74.jpg" alt="Ring Puff 100gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#5e8167;color:white;font-size:11px;text-align:center">Next Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/RingPuff100gm1638349861ECT74.jpg" id="image_path122" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Ring Puff 100gm</a>
                                    </h3>


                                    <div class="product-price">
                                        <ins class="new-price">Tk.90</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Tart & Muffin column -->
                <div class="mb-4 col-md-4 ">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                            'name': 'fadeIn',
                            'delay': '.3s'
                        }">

                        <div class="mb-4 title-wrapper">
                            <h2 class="mb-0 title title-underline cstb">Tart & Muffin</h2>
                            <div class="mb-4 title-wrapper">
                                <a href="{{ route('front-product.all-index', ['slug' => 'tart-muffin']) }}" class="btn btn-link"><i class="fa-solid fa-caret-left"></i> &nbsp; <span class="cst">View All</span> </a>
                            </div>
                        </div>

                        <div class="products-col">

                            <!-- Dynamicly Loads Products of Tart & Muffins -->
                            @foreach ($tart as $key => $data)
                                @php
                                    $images = json_decode($data->images, true);
                                    $sell_price = json_decode($data->sell_price, true);
                                    $sell_weight = json_decode($data->sell_weight, true);

                                    $new = \Carbon\Carbon::parse($data->created_at)->gt(\Carbon\Carbon::now()->subDays(2));
                                @endphp
                                <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                    <figure class="product-media">
                                        <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                            <!-- thumbnail -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">

                                            <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">

                                            <!-- Additional image -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                        </a>

                                        @if ($data->delivery_type == 1)
                                            <p style="background:#4DAE67;color:white;font-size:11px;text-align:center"><span class="cst">Same Day Delivery</span></p>
                                        @else
                                            <p style="background:#5e8167;color:white;font-size:11px;text-align:center"><span class="cst">Next Day Delivery</span></p>
                                        @endif

                                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                                        <!-- Shows new banner if created within 2 days -->
                                        @if ($new)
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                        @endif
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                                        <select id="{{ 'product-weight-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                            @foreach ($sell_price as $sub_key => $price)
                                                                <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                                \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                                <a style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}')" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
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

                            {{-- <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChocolateTart75gm16383482430dFYS.jpg" alt="Chocolate Tart 75gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChocolateTart75gm1638348243ODOAS.jpg" alt="Chocolate Tart 75gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/ChocolateTart75gm1638348243ODOAS.jpg" id="image_path45" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Chocolate Tart 75gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.145</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/AmericanMuffinChocolate110gm1638348285hUs4t.jpg" alt="American Muffin Chocolate 110gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/AmericanMuffinChocolate110gm16383482858zPWB.jpg" alt="American Muffin Chocolate 110gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/AmericanMuffinChocolate110gm16383482858zPWB.jpg" id="image_path50" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">American Muffin Chocolate 110gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.170</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChocolateLava50gm1638419926xAeqQ.jpg" alt="Chocolate Lava 50gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChocolateLava50gm1638419926Ib6ko.jpg" alt="Chocolate Lava 50gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#5e8167;color:white;font-size:11px;text-align:center">Next Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/ChocolateLava50gm1638419926Ib6ko.jpg" id="image_path170" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Chocolate Lava 50gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.135</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Desserts column -->
                <div class="mb-4 col-md-4">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'delay': '.5s'
                    }">
                        <div class="mb-4 title-wrapper">
                            <h2 class="mb-0 title title-underline cstb">Desserts</h2>
                            <div class="mb-4 title-wrapper">
                                <a href="{{ route('front-product.all-index', ['slug' => 'desserts']) }}" class="btn btn-link"><i class="fa-solid fa-caret-left"></i> &nbsp; <span class="cst">View All</span> </a>
                            </div>
                        </div>

                        <div class="products-col">

                            <!-- Dynamicly Loads Products of Desserts -->
                            @foreach ($dessert as $key => $data)
                                @php
                                    $images = json_decode($data->images, true);
                                    $sell_price = json_decode($data->sell_price, true);
                                    $sell_weight = json_decode($data->sell_weight, true);

                                    $new = \Carbon\Carbon::parse($data->created_at)->gt(\Carbon\Carbon::now()->subDays(2));
                                @endphp
                                <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                    <figure class="product-media">
                                        <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                            <!-- thumbnail -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">

                                            <input id="{{ 'product-image-'.($data->code) }}" type="hidden" value="{{ asset('images/products/'.$data->code.'/'.$data->thumbnail) }}">

                                            <!-- Additional image -->
                                            <img data-src="{{ asset('images/products/'.$data->code.'/'.($images[0] ?? $data->thumbnail)) }}" class="lozad" alt="{{ $data->name }}" width="300" height="338">
                                        </a>

                                        @if ($data->delivery_type == 1)
                                            <p style="background:#4DAE67;color:white;font-size:11px;text-align:center"><span class="cst">Same Day Delivery</span></p>
                                        @else
                                            <p style="background:#5e8167;color:white;font-size:11px;text-align:center"><span class="cst">Next Day Delivery</span></p>
                                        @endif

                                        <input type="hidden" id="product-delivery-type-{{ $data->code }}" value="{{ $data->delivery_type }}">

                                        <!-- Shows new banner if created within 2 days -->
                                        @if ($new)
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                        @endif
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                                        <select id="{{ 'product-weight-'.($data->code) }}" class="form-control product_weight_select" onchange="onProductPriceChange(this.value,'{{ 'product-price-'.($data->code) }}')">
                                                            @foreach ($sell_price as $sub_key => $price)
                                                                <option value="{{ $price }}" {{ ($sub_key == 0) ? 'selected' : ''}}>{{
                                                                \App\Helpers\Utility::calculateWeightString($sell_weight[$sub_key])
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                                <a style="cursor:pointer" onclick="add_to_cart('{{ $data->code }}')" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
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

                            {{-- <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/ChocolateBrownie50gm1638348313x6FpP.jpg" alt="Chocolate Brownie 50gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/ChocolateBrownie50gm1638348313x6FpP.jpg" id="image_path55" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Chocolate Brownie 50gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.185</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/DanishPastry80gm1638764782oL6Mm.jpg" alt="Danish Pastry 80gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/DanishPastry80gm1638764782oL6Mm.jpg" id="image_path176" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Danish Pastry 80gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.215</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-with-qty product-list-sm" style="margin-top:20px">
                                <figure class="product-media">
                                    <a href="#">
                                        <img data-src="https://breadandbeyondbd.com/Ecom/Product/RedVelvetSwissRoll1638349935Lwmuu.jpg" alt="Red Velvet Swiss Roll 100gm" class="lozad" width="150" height="169" style="background-color: #f5f5f5;" />
                                    </a>

                                    <p style="background:#4DAE67;color:white;font-size:11px;text-align:center">Same Day Delivery</p>
                                    <input type="hidden" value="Ecom/Product/RedVelvetSwissRoll1638349935Lwmuu.jpg" id="image_path126" name="image_path">
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="#">Red Velvet Swiss Roll 100gm</a>
                                    </h3>

                                    <div class="product-price">
                                        <ins class="new-price">Tk.140</ins>
                                    </div>

                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <button class="quantity-minus fa-solid fa-minus"></button>
                                            <input id="quantity65" class="quantity form-control" type="number" min="1" max="1000000" readonly>
                                            <button class="quantity-plus fa-solid fa-plus"></button>
                                        </div>

                                        <a style="cursor:pointer" onclick="addToCart(65)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end Column Products -->


        <!-- Gallery Section -->
        <section class="container pt-2 pb-10 instagram-section pt-md-7 pt-sm-4 mb-md-3 appear-animate gallery" data-animation-options="{
                'delay': '.3s'
            }">

            <div class="mb-4 title-wrapper">
                <h2 class="mb-0 title title-underline cstb">Our Gallery</h2>
            </div>

            <div id="owl-carousel-gallery" class="owl-carousel owl-theme row cols-xl-5 cols-lg-4 cols-md-3 cols-sm-2 cols-2" data-owl-options="{
                'nav': false,
                'dots': false,
                'autoplay': false,
                'margin': 20,
                'loop': false,
                'lazyLoad': true,
                'autoplayTimeout': 3000,
                'responsive': {
                    '0': { 'items': 2 },
                    '576': { 'items': 2 },
                    '768': { 'items': 3 },
                    '992': { 'items': 4 },
                    '1200': { 'items': 5 }
                }
            }">
                @for ($i = 0; $i < 6; $i++)
                    <a href="{{ asset('images/homepage/gallery/'.$i.'.webp') }}" id="welcomePopup" data-fancybox="images">
                        <figure class="instagram">
                            <img data-src="{{ asset('images/homepage/gallery/'.$i.'.webp') }}" class="lozad" alt="brand" width="220" height="220" />
                        </figure>
                    </a>
                @endfor
            </div>
        </section>
        <!-- end Gallery Section -->

    </div>
</main>



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

<script>
    $(document).ready(function() {
        $(".home-active").css({
            'color': '#4DAE67'
        });
    });
</script>

@endsection
