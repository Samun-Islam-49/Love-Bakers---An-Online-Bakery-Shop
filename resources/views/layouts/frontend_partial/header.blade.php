<header class="header">

    <!-- Topmost Navbar -->
    <div class="header-top">
        <div class="container">
            <!-- top marquee text -->
            <div class="header-left" style="overflow: hidden;padding-right:15px;">
                <marquee class="cst" style="padding: 1.1rem 0 1rem;">Indulge in the love of freshly baked delights at Love Bakers! From custom cakes to warm pastries, every bite is crafted with passion and a sprinkle of love. Taste the difference today!</marquee>
            </div>

            <!-- Right side of top navbar-->
            <div class="header-right rfs">
                <!-- top menu header -->
                <a href="#"><i class="fa-solid fa-truck-fast"></i>&nbsp; Track Order</a>
                <a href="#"><i class="fa-regular fa-circle-question"></i>&nbsp; Need Help?</a>

                @auth('web')
                    <!-- Show Profile Link if user is logged in -->
                    <a href="{{ route('customer.profile') }}"><i class="fa-regular fa-user"></i>&nbsp; Profile</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> &nbsp; Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth

                @auth('admin')
                    <!-- Show Profile Link if admin is logged in -->
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-regular fa-user"></i>&nbsp; Admin</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> &nbsp; Logout
                    </a>

                    <form id="logout-form-admin" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth

                @if(Auth::guest() && Auth::guard('admin')->guest())
                    <!-- Show Login and Register links if user and admin are not logged in -->
                    <a href="{{ route('login') }}"><i class="fa-regular fa-user"></i> &nbsp; Sign in</a>
                    <a href="{{ route('register') }}"><i class="fa-regular fa-user"></i>&nbsp; Register</a>
                @endif
            </div>
        </div>
    </div>
    <!-- end Topmost Navbar -->


    <!-- Middile Navbar -->
    <div class="header-middle">
        <div class="container">
            <div class="header-left">

                <!-- Mobile Menu Toggle -->
                <a href="#" class="mobile-menu-toggle">
					<i class="fa-solid fa-bars"></i>
				</a>
                <!-- end Mobile Menu Toggle -->

                <!-- Logo -->
                <a href="{{ route('front.index') }}" class="logo">
                    <img src="{{ asset('images/brand/brand_logo.png') }}" alt="logo" width="100" height="15" />
                </a>
                <!-- End Logo -->

                <!-- Header Search -->
                <div class="header-search hs-simple">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" id="search-item" name="search" autocomplete="off"
                            placeholder="Search cakes, cookies, breads" required />
                        <a class="btn btn-search" onclick="search_item()">
                            <i class="fa-solid fa-magnifying-glass" style="margin-top: 22px"></i>
                        </a>
                    </div>
                </div>
                <!-- End Header Search -->
            </div>

            <div class="header-right cst">

                <a href="tel:#" class="icon-box icon-box-side mobile-phoneIcon">
                    <div class="mr-0 icon-box-icon mr-lg-2">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title cst">Call Us Now:</h4>
                        <p>01790162307</p>
                    </div>
                </a>

                <span class="divider"></span>

                <div class="mr-0 dropdown cart-dropdown type2 cart-offcanvas mr-lg-2">

                    <!-- Cart Toggle -->
                    <a href="#" class="cart-toggle label-block link">
                        <div class="cart-label d-lg-show">
                            <span class="cart-name">Shopping Cart:</span>
                            <span class="cart-price">Tk. 0</span>
                        </div>
                        <i class="fa-solid fa-cart-shopping"><span class="cart-count">0</span></i>
                    </a>

                    <div class="cart-overlay"></div>
                    <!-- End Cart Toggle -->

                    <!-- Curt Dropdown Box -->
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <h4 class="cart-title cst">Shopping Cart</h4>
                            <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close"><span class="cst">close</span><i class="fa-solid fa-arrow-right"></i>
                                <span class="sr-only">Cart</span>
                            </a>
                        </div>

                        <!-- cart in data display start -->
                        <div class="display-cart-product">
                            <div class="products scrollable cart-product-container">
                            </div>

                            <div class="cart-total cart-footer">
                                <label>Subtotal:</label><span class="cart-price cstb" style="color: black;">Tk. 0</span>
                            </div>
                            <div class="cart-action cart-footer">
                                <a href="{{ route('front-product.cart-view') }}" class="btn btn-dark btn-link">
                                    <span class="cstb" >View Cart</span>
                                </a>
                                <a href="{{ route('checkout.index') }}" style="background:#4DAE67;border:none" class="btn btn-dark">
                                    <span class="cstb" >Go To Checkout</span>
                                </a>
                            </div>
                        </div>
                        <!-- cart in data display end -->

                    </div>
                    <!-- End Curt Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Middile Navbar -->

    @php
        $reg_cat = \Illuminate\Support\Facades\DB::table('categories')->get();
        $cake_cat = \Illuminate\Support\Facades\DB::table('subcategories')->where('cat_id', 3)->get();
        $exc_cat = \Illuminate\Support\Facades\DB::table('subcategories')->where('cat_id', 18)->get();
    @endphp

    <!-- Bottom Navbar (Menu) -->
    <div class="header-bottom sticky-header fix-top sticky-content d-lg-show" style="height: 50px; padding-bottom: 15px;">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu cst">

                        <li class="home-active">
                            <a href="{{ route('front.index') }}"> <sub>Home</sub> </a>
                        </li>

                        <li class="menu-active">
                            <a style="cursor:pointer"><sub>Menu</sub></a>

                            <!-- Megamenu -->
                            <div class="megamenu" style="width:1000px">
                                <div class="row">
                                    <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                        <h4 class="menu-title cst">Regular Product</h4>
                                        <ul>
                                            @foreach ($reg_cat as $cat)
                                                <li><a href="{{ route('front-product.all-index', ['slug' => $cat->category_slug]) }}">{{ $cat->category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                        <h4 class="menu-title cst">Cakes</h4>
                                        <ul>
                                            @foreach ($cake_cat as $cat)
                                                <li><a href="{{ route('front-product.all-index', ['slug' => $cat->subcat_slug]) }}">{{ $cat->subcat_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                        <h4 class="menu-title cst">Gift Box</h4>
                                        <ul>
                                            <li><a href="#">Dessert Box</a></li>
                                        </ul>
                                    </div>

                                    <div
                                        class="col-6 col-sm-3 col-md-3 col-lg-3 menu-banner menu-banner1 banner banner-fixed">
                                        <figure>
                                            <img src="{{ asset('images/homepage/menu_banner.jpeg') }}" alt="Menu banner" width="220"
                                                height="330" style="filter: blur(2px);" />
                                        </figure>

                                        <div class="banner-content y-50">

                                            <h3 class="banner-title font-weight-bold cst">....Yum</h3>
                                            <a href="#" class="btn btn-link btn-underline">
                                                <span class="cstb">Order Now</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Megamenu -->
                            </div>
                        </li>

                        <li class="cake-active">
                            <a style="cursor:pointer"> <sub>Cake by Flavor</sub></a>
                            <ul>
                                @foreach ($cake_cat as $cat)
                                    <li><a href="{{ route('front-product.all-index', ['slug' => $cat->subcat_slug]) }}">{{ $cat->subcat_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="customizecake-active">
                            <a style="cursor:pointer"><sub>Customized Cakes</sub> </a>
                            <ul>
                                @foreach ($exc_cat as $cat)
                                    <li><a href="{{ route('front-product.all-index', ['slug' => $cat->subcat_slug]) }}">{{ $cat->subcat_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="cakestudio-active">
                            <a href="#"><sub>Cake Studio</sub> </a>
                        </li>

                        <li class="giftbox-active">
                            <a href="#"><sub>Gift Box</sub> </a>
                        </li>

                        <li class="story-active">
                            <a href="#"><sub>Our Story</sub> </a>
                        </li>

                        <li class="location-active">
                            <a href="#"><sub>Location</sub> </a>
                        </li>

                        <li class="contact-active">
                            <a href="#"><sub>Contact Us</sub> </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="mr-0 dropdown cart-dropdown type2 cart-offcanvas mr-lg-2" id="dynamic_cart_display" style="display:none">
                <a href="#" class="cart-toggle label-block link">
                    <div class="cart-label d-lg-show">
                        <span class="cart-name cst">Shopping Cart:</span>
                        <span class="cart-price">Tk.0</span>
                    </div>
                    <i class="fa-solid fa-cart-shopping"><span class="cart-count">0</span></i>
                </a>
                <!-- End Dropdown Box -->
            </div>
        </div>
    </div>

    <!-- Custom Style Overrides -->
    <style>
        .header-bottom .main-nav ul.menu li a sub {
            font-size: 1.35rem; /* Adjust font size as needed */
        }
    </style>
</header>
