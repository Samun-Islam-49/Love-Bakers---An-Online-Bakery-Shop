<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

		<!-- Favicon -->
		<link rel="icon" type="image/png" href="{{ asset('images/brand/favicon.png') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Coustard:wght@400;900&family=Rakkas&display=swap" rel="stylesheet">

        <style>
            .rfs {
                font-family: "Rakkas", serif;
                font-weight: 400;
                font-style: normal;
            }

            .cst {
                font-family: "Coustard", serif;
                font-weight: 400;
                font-style: normal;
            }

            .cstb {
            font-family: "Coustard", serif;
            font-weight: 900;
            font-style: normal;
            }

        </style>
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


        <!-- header linkers -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/animate.css') }}">

        <!-- Plugins CSS File -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/magnific-popup.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/jquery.fancybox.css') }}">

        <!-- Main CSS File -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/demo-food.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}">

        <!-- Additional CSS File -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/additional_css.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main_menu.css') }}">


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

	<body>

        {{ \App\Helpers\Utility::view_counter() }}

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


        <!-- Plugins JS File -->
        <script src="{{ asset('frontend/js/plugins/parallax.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/imagesloaded.pkgd.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/owl.carousel.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script src="{{ asset('frontend/js/customjsx.js') }}"></script>
        <script src="{{ asset('frontend/js/productsmt.js') }}"></script>

        <!-- custom js -->
        <script src="{{ asset('frontend/js/plugins/jquery.fancybox.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/lozad.js') }}"></script>



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



        <div class="page-wrapper">

            <!-- Begin Header --> <!-- Contains Multiple Navbars -->
            @include('layouts.frontend_partial.header')
            <!-- End Header -->

            <!-- main content -->
            @yield('main_content')
			<!-- End of Main -->

            <!-- footer section -->
            @include('layouts.frontend_partial.footer')
            <!-- End Footer -->

        </div>

        <!-- Begin Mobile Section --><!-- Sticky Footer and Mobile Menu -->
        @include('layouts.frontend_partial.utils.mobile_menu')
        <!-- End Mobile Section -->


        <!-- Scroll Top -->
        <style>
            #scroll-top.fade-out {
                opacity: 0; /* Fades out when hiding */
            }
        </style>
        <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fa-solid fa-arrow-up"></i></a>
        <!-- end Scroll Top -->




        <!-- Custom Scripts -->

        @include('layouts.frontend_partial.cart')

        <script>
            function search_item() {
                var search = $('#search-item').val().trim().toLowerCase();

                if (search === '') {
                    return; // Stop if the search input is empty
                }

                // Redirect to the URL with the search term
                window.location.href = '{{ route('front-product.all-index') }}' + '/search-' + encodeURIComponent(search);
            }
        </script>



        <script>
        //quantity decreament
        function quantityDec(id){
            var dec_val = $("#quantity"+id).val();
            if(dec_val > 1){
                var decreament = parseInt(dec_val)-1;
                $("#quantity"+id).val(decreament);
            }
        }


        //quantity increament
        function quantityInc(id){
            var inc_val = $("#quantity"+id).val();
            var increament = parseInt(inc_val)+1;
            $("#quantity"+id).val(increament);
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


        <script>
            const observer = lozad();
            observer.observe();
                $('#welcomePopup').fancybox({
                    selector: '.gallery .owl-item:not(.cloned) a',
                    hash: false,
                    loop: true,
                    thumbs: {
                        autoStart: false
                    },
                    buttons: [
                        'close'
                    ]
                });
        </script>


        <script>
             //for f12 button disabled
              document.onkeydown = function(e) {
                if(event.keyCode == 123) {
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)){
                    return false;
                }
                }
        </script>


        <!-- Scroll top controller -->
        <script>
            let scrollTimeout;

            window.addEventListener('scroll', () => {
                const scrollTopButton = document.getElementById('scroll-top');

                // Show button when scrolled down 100px
                if (window.scrollY > 100) {
                    scrollTopButton.style.display = 'block';
                    scrollTopButton.classList.remove('fade-out'); // Ensure visibility on scroll

                    // Reset any previous timeout to hide the button
                    clearTimeout(scrollTimeout);

                    // Set a timeout to hide after 2 seconds
                    scrollTimeout = setTimeout(() => {
                        scrollTopButton.classList.add('fade-out'); // Add fade-out effect
                        setTimeout(() => {
                            scrollTopButton.style.display = 'none'; // Hide fully after fade-out
                        }, 500); // Match fade-out duration (0.5s in CSS)
                    }, 2000);
                } else {
                    scrollTopButton.style.display = 'none';
                }
            });

            // Optional: Reset hiding when button is clicked
            document.getElementById('scroll-top').addEventListener('click', () => {
                clearTimeout(scrollTimeout); // Stop hide countdown
            });
        </script>
        <!-- end Scroll top controller -->

    </body>
</html>
