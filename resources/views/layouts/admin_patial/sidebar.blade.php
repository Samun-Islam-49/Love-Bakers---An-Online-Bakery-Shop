<!--begin::Sidebar-->
<aside class="shadow app-sidebar bg-body-secondary" data-bs-theme="dark">

    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">

        <!--begin::Brand Link-->
        <a href="{{ route('admin.dashboard') }}" class="brand-link">

            <!--begin::Brand Image-->
            <img src="{{ asset('images/brand/brand_logo.png') }}" alt="LoveBakers" class="shadow opacity-75 brand-image" style="border-radius: 10%; object-fit: cover; transform: scale(1.25);">


            <!--end::Brand Image-->

            <!--begin::Brand Text-->
            <span class="brand-text fw-light">LoveBakers</span>
            <!--end::Brand Text-->

        </a>
        <!--end::Brand Link-->

    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">

            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>Dashboard</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Categories
                            <span class="nav-badge badge text-bg-secondary me-3"></span> <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item"> <a href="{{ route('category.index') }}" class="nav-link"> <i class="nav-icon bi bi-clipboard"></i>
                                <p>Main Categories</p>
                            </a> </li>

                        <li class="nav-item"> <a href="{{ route('subcategory.index') }}" class="nav-link"> <i class="nav-icon bi bi-clipboard"></i>
                                <p>Sub-categories</p>
                            </a> </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="fa-solid fa-utensils"></i>
                        <p>
                            Products
                            <span class="nav-badge badge text-bg-secondary me-3"></span> <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item"> <a href="{{ route('product.create') }}" class="nav-link"> <i class="fa-solid fa-pizza-slice"></i>
                                <p>New Product</p>
                            </a> </li>

                        <li class="nav-item"> <a href="{{ route('product.index') }}" class="nav-link"> <i class="fa-solid fa-pizza-slice"></i>
                                <p>Product Management</p>
                            </a> </li>

                        <li class="nav-item"> <a href="{{ route('order.index') }}" class="nav-link"> <i class="fa-solid fa-cart-plus"></i>
                            <p>Orders</p>
                        </a> </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="fa-solid fa-gear"></i>
                        <p>
                            Settings
                            <span class="nav-badge badge text-bg-secondary me-3"></span> <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item"> <a href="{{ route('seo.create') }}" class="nav-link"> <i class="fa-solid fa-gears"></i>
                                <p>SEO Settings</p>
                            </a> </li>

                        <li class="nav-item"> <a href="{{ route('settings.index') }}" class="nav-link"> <i class="fa-solid fa-gears"></i>
                                <p>Website Settings</p>
                            </a> </li>

                        <li class="nav-item"> <a href="{{ route('smtp.create') }}" class="nav-link"> <i class="fa-solid fa-gears"></i>
                                <p>SMTP Settings</p>
                            </a> </li>

                        <li class="nav-item"> <a href="{{ route('page.index') }}" class="nav-link"> <i class="fa-solid fa-gears"></i>
                                <p>Page Management</p>
                        </a> </li>

                        <li class="nav-item"> <a href="./layout/layout-custom-area.html" class="nav-link"> <i class="fa-solid fa-gears"></i>
                                <p>Payment Gateway</p>
                        </a> </li>
                    </ul>
                </li>


                <li class="nav-header">PROFILE</li>

                <li class="nav-item"> <a href="{{ route('admin.change_password') }}" class="nav-link"> <i class="fa-solid fa-key text-info"></i>
                        <p class="text">Chnage Password</p>
                    </a> </li>

                <li class="nav-item"> <a href="#" onclick="admin_logout()" class="nav-link"></i><i class="fa-solid fa-right-from-bracket text-danger"></i>
                        <p class="text">Log Out</p>
                    </a> </li>
            </ul>
            <!--end::Sidebar Menu-->

        </nav>
    </div>
    <!--end::Sidebar Wrapper-->

</aside>
<!--end::Sidebar-->
