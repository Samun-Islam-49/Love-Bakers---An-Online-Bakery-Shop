@extends('layouts.app')
@section('main_content')

<main class="main shop display-search-result">

    <!-- PageHeader -->
    <div class="page-header" style="background-image: url('/images/homepage/all_products_banner.jpeg'); background-color: #daebfb; height: 250px; width: auto;">
        <h1 class="page-title cstb">{{ $meta['name'] }}</h1>
        <input type="hidden" value="{{ $meta['cat_id'] }}" id="cat_id">
    </div>
    <!-- End PageHeader -->

    <!-- Main Contents -->
    <div class="pb-3 mt-1 mb-6 page-content">
        <div class="container">
            <div class="row main-content-wrap gutter-lg">

                <!-- Sidebar content for mobiles devices -->
                <aside class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper" style="display: none;">

                    <div class="sidebar-overlay">
                        <a class="sidebar-close" href="#"><i class="fa-solid fa-xmark"></i></a>
                    </div>

                    <div class="sidebar-content">
                        <div class="sticky-sidebar" data-sticky-options="{'top': 80}">

                            <div class="mb-4 filter-actions pt-lg-6">
                                <a href="#" class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-icon-right">
                                    <span class="cstb">Quick Search</span> <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>

                            <div class="widget widget-collapsible">

                                <h3 class="widget-title"><span class="cstb">Quick Search</span><span class="toggle-btn"></span></h3>

                                <ul class="widget-body ">
                                    @foreach ($cats as $cat)
                                        <li class="tag">
                                            <a href="{{ route('front-product.all-index', ['slug' => $cat->category_slug]) }}">
                                                <span class="cst">{{ $cat->category_name }}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @foreach ($subcats as $subcat)
                                        <li class="tag">
                                            <a href="{{ route('front-product.all-index', ['slug' => $subcat->subcat_slug]) }}">
                                                <span class="cst">{{ $subcat->subcat_name }}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>


                <div class="mt-2 col-lg-12 main-content">


                    <nav class="toolbox sticky-toolbox sticky-content fix-top" style="">
                        <div class="toolbox-left">

                            <a href="#" class="left-sidebar-toggle btn btn-outline btn-primary btn-icon-right d-sm-none">
                                <span class="cstb">Quick Search</span> <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <div>
                                <a style="width: 100%; height: 30px;" class="widget-title btn btn-outline btn-primary btn-icon-right" id="quick_search">
                                    <span class="cstb">Quick Search</span> <i class="fa-solid fa-arrow-down"></i>
                                </a>
                            </div>
                        </div>

                        <div class="widget tags-menu col-lg-12" style="">
                            <ul class="widget-body">
                                @foreach ($cats as $cat)
                                    <li class="tag">
                                        <a href="{{ route('front-product.all-index', ['slug' => $cat->category_slug]) }}">
                                            <span class="cst">{{ $cat->category_name }}</span>
                                        </a>
                                    </li>
                                @endforeach

                                @foreach ($subcats as $subcat)
                                    <li class="tag">
                                        <a href="{{ route('front-product.all-index', ['slug' => $subcat->subcat_slug]) }}">
                                            <span class="cst">{{ $subcat->subcat_name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>

                    <!-- List of products -->
                    <div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper">
                        @foreach ($products as $key => $data)
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

                                @if($meta['cat_id'] == 18)
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('front-product.index', ['code' => $data->code]) }}">
                                                <span id="{{ 'product-name-'.($data->code) }}" class="cst">
                                                    {{ $data->name.' '.(($data->unit_type == 0) ? (\App\Helpers\Utility::calculateWeightString($sell_weight[0])) : '') }}
                                                </span>
                                            </a>
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
                                @else
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
                                @endif

                            </div>
                        @endforeach
                    </div>


                    @php
                        $page = $products->currentPage(); // Current page number
                        $totalPages = $products->lastPage(); // Total number of pages
                    @endphp

                    <!-- Custom Pagination -->
                    <nav class="toolbox toolbox-pagination">
                        <ul class="pagination" role="navigation">
                            {{-- Previous Page Link --}}
                            @if ($page == 1)
                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">‹</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev" aria-label="« Previous">‹</a>
                                </li>
                            @endif

                            {{-- Pagination Links --}}
                            @for ($i = 1; $i <= $totalPages; $i++)
                                @if ($i == $page)
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            {{-- Next Page Link --}}
                            @if ($page == $totalPages)
                                <li class="page-item disabled" aria-disabled="true" aria-label="Next »">
                                    <span class="page-link" aria-hidden="true">›</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next" aria-label="Next »">›</a>
                                </li>
                            @endif
                        </ul>
                    </nav>



                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(document).ready(function(){
        resize();//call the function for screen controll

        $(".home-active").css({'color':'#000000'});

        var cat_id = $("#cat_id").val();//menu identify class

        if(cat_id == 3){
            $(".cake-active").css({'color':'#4DAE67'});
        } else if (cat_id == 18) {
            $(".customizecake-active").css({'color':'#4DAE67'});
        } else{
            $(".menu-active").css({'color':'#4DAE67'});
        }
    });
    $(window).resize(function(){resize();});
//function for mobile view and desktop view for side menubar
    function resize()
    {
        var mobileMaxWidth = 640; //Define this to whatever size you want
        if($(window).width() > mobileMaxWidth)
        {
            $(".sidebar-fixed").show();
            $(".sidebar-fixed").hide();
            $("#quick_search").show();
            $(".tags-menu").show();
        }
        else
        {
            $(".sidebar-fixed").hide();
            $(".sidebar-fixed").show();
            $("#quick_search").hide();
            $(".tags-menu").hide();
        }
    }
    //tags menu toggle
    $("#quick_search").click(function(){
        $(".tags-menu").slideToggle();
    });
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
