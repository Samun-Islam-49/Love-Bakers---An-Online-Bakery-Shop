<div class="sticky-footer sticky-content fix-bottom" style="background-color:#00472f; color:#fff;font-weight:1;">

    <a href="{{ route('front.index') }}" class="sticky-link active" style="color:white">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
    </a>

    <a class="sticky-link mobile-menu-toggle" style="color:white">
        <i class="fa-solid fa-bars"></i>
        <span>Menu</span>
    </a>

    <a href="{{ route('login') }}" class="sticky-link login-link">
        <i class="fa-solid fa-user"></i>
        <span>Account</span>
    </a>

    <!-- cart menu display start -->
    <div class="mr-0 dropdown cart-dropdown type2 cart-offcanvas mr-lg-2 sticky-link" style="margin-top: 8px">
        <a href="#" class="cart-toggle label-block link" style="margin-left: -10px">
            <i class="fa-solid fa-cart-shopping" style="height: 20px; margin: 0"><span class="cart-count" style="margin-top:-8px;margin-right:-9px">0</span></i>
        </a>

        <span style="margin-top: 10px; padding: 0">Cart</span>
        <!-- End Dropdown Box -->
    </div>
    <!-- end cart menu -->

</div>

@php
    $reg_cat = \Illuminate\Support\Facades\DB::table('categories')->get();
    $cake_cat = \Illuminate\Support\Facades\DB::table('subcategories')->where('cat_id', 3)->get();
    $exc_cat = \Illuminate\Support\Facades\DB::table('subcategories')->where('cat_id', 18)->get();
@endphp

<!-- Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->

    <a class="mobile-menu-close" href="#"><i class="fa-solid fa-xmark"></i></a>
    <!-- End of CloseButton -->

    <div class="mobile-menu-container scrollable">

        <div class="input-wrapper">
            <input type="text" class="form-control" id="search-item" name="search" autocomplete="off"
                placeholder="Search cakes, cookies, breads" />
            <button class="btn btn-search">
                <a class="mobile-menu-close" href="#"><i class="fa-solid fa-magnifying-glass" style="margin-top: 17px"></i></i></a>
            </button>
        </div>
        <!-- End of Search Form -->

        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="{{ route('front.index') }}">Home</a>
            </li>

            <li>
                <a style="cursor:pointer">Menus</a>
                <ul>
                    <li>
                        <a style="cursor:pointer">Cakes</a>
                        <ul>
                            @foreach ($cake_cat as $cat)
                                <li><a href="{{ route('front-product.all-index', ['slug' => $cat->subcat_slug]) }}">{{ $cat->subcat_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li>
                        <a style="cursor:pointer">Gift Box</a>
                        <ul>
                            <li><a href="#">Dessert Box</a></li>
                        </ul>
                    </li>

                    <li>
                        <a style="cursor:pointer">Regular Product</a>
                        <ul>
                            @foreach ($reg_cat as $cat)
                                <li><a href="{{ route('front-product.all-index', ['slug' => $cat->category_slug]) }}">{{ $cat->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                 </ul>
            </li>

            <li>
                <a style="cursor:pointer">Cake by Flavor</a>
                    <ul>
                        @foreach ($cake_cat as $cat)
                            <li><a href="{{ route('front-product.all-index', ['slug' => $cat->subcat_slug]) }}">{{ $cat->subcat_name }}</a></li>
                        @endforeach
                    </ul>
            </li>

            <li>
                <a style="cursor:pointer">Customized Cakes</a>
                <ul>
                    @foreach ($exc_cat as $cat)
                        <li><a href="{{ route('front-product.all-index', ['slug' => $cat->subcat_slug]) }}">{{ $cat->subcat_name }}</a></li>
                    @endforeach
                </ul>
            </li>


            <li>
                <a href="#">Digital Cake Studio</a>
            </li>
            <li>
                <a href="#">Custom Cake Request</a>
            </li>
            <li>
                <a href="#">Our Story</a>
            </li>
            <li>
                <a href="#">Location</a>
            </li>
            <li>
                <a href="#">Contact Us</a>
            </li>
        </ul>
    </div>
</div>
