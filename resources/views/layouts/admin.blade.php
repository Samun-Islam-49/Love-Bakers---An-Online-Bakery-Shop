<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin Panel</title>


    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Admin Panel">
    <meta name="author" content="ColorlibHQ">
    <!--end::Primary Meta Tags-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/brand/favicon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts-->


    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)-->


    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)-->


    <!--begin::Required Plugin(Material Component)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css">
    <!--end::Required Plugin(Material Component)-->


    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.css') }}">
    <!--end::Required Plugin(AdminLTE)-->


    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">


    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.material.css">

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">

    <!-- Dropify -->
    <link href="{{ asset('backend/plugins/dropify/dist/css/dropify.css') }}" rel="stylesheet">

    <!-- Bootstrap-tagsinput -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/tagsinput/dist/bootstrap-tagsinput.css') }}">

    <!-- Bootstrap 5 toggle -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/css/bootstrap5-toggle.min.css" rel="stylesheet">





</head>
<!--end::Head-->

<!--begin::Body-->
<body>

    <!--begin::Script-->

    <!-- REQUIRED SCRIPTS -->

    <!--begin::Required Plugin(JQuery)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(JQuery)-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->


    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->


    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)-->


    <!--begin::Required Plugin(Material Component)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js"></script>
    <!--end::Required Plugin(Material Component)-->


    <!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('backend/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->




    <!-- OPTIONAL SCRIPTS -->

    <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.material.js"></script>


    <!-- Font Awesome Kit JS -->
    <script src="https://kit.fontawesome.com/efab5ac674.js" crossorigin="anonymous"></script>

    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <!-- Dropify -->
    <script src="{{ asset('backend/plugins/dropify/dist/js/dropify.js') }}"></script>

    <!-- Bootstrap-tagsinput -->
    <script src="{{ asset('backend/plugins/tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Bootstrap 5 toggle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/js/bootstrap5-toggle.jquery.min.js"></script>


    <!--end::Script-->




    <!--begin::Main Body-->
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">

        {{ \App\Helpers\Utility::view_counter() }}

    @guest
    @else
        <!--begin::App Wrapper-->
        <div class="app-wrapper">

            <!-- Navbar -->
            @include('layouts.admin_patial.navbar')

            <!-- Sidebar -->
            @include('layouts.admin_patial.sidebar')

    @endguest

            <!-- Dynamic Placeholder -->
            @yield('admin_content')

        </div>
        <!--end::App Wrapper-->
    </div>
    <!--end::Main Body-->





    <!--begin::Custom Scripts-->

    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->


    <!-- Admin Logout Handler-->
    <form id="admin-logout-form" method="POST" action="{{ route('admin.logout') }}">
        @csrf
    </form>

    <script>
        function admin_logout() {
            Swal.fire({
                title: "Are you sure you want to log out?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Log Out!",
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6"
            })
            .then((logout) => {
                if (logout.isConfirmed) {
                    document.getElementById('admin-logout-form').submit();
                }
            });
        }
    </script>


    <!-- Toast Message using SweetAllert2 -->
    <script>
        @if(Session::has('message'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: "{{ session('alert-type', 'info') }}",
            title: "{{ session('message') }}",
            showConfirmButton: false,
            timer: 3000
        });
        @endif
    </script>

    <!--end::Custom Scripts-->

</body>
<!--end::Body-->

</html>
