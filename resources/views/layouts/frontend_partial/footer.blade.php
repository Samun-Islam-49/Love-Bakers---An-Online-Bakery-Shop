<footer class="footer" style="background-color:#00472f">
    <div class="container">

        <!-- Custom style override for showing icons on mobile view -->
        <style>
            /* Add plus icon */
            .accordion .card-header .expand::after {
                font-family: 'Font Awesome 6 Free'; /* Ensure Font Awesome is loaded */
                content: "\2b"; /* Font Awesome "plus" icon */
                float: right;
                font-size: 20px;
                font-weight: bold;
                font-style: normal;
            }

            .accordion .card-header .collapse::after {
                font-family: 'Font Awesome 6 Free';
                content: "\f068"; /* Font Awesome "minus" icon */
                float: right;
                font-size: 20px;
                font-weight: bold;
                font-style: normal;
            }

        </style>

        <!-- Top Footer -->
        <div class="footer-middle">
            <div class="row">

                <!-- Brand Qoute -->
                <div class="col-lg-4 col-md-12">
                    <div class="widget widget-about">
                        <a href="{{ route('front.index') }}" class="logo-footer">
                            <img src="{{ asset('images/brand/footer-logo.png') }}" alt="logo-footer" width="154" height="43" />
                        </a>
                        <div class="widget-body">
                            <p class="cst">
                            At Love Bakers, every bite tells a story of purity and tradition. We say <b> NO to Preservatives and Synthetic Ingredients </b>, focusing instead on fresh, natural ingredients for wholesome, delicious treats that celebrate the joy of real flavors..
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Page links -->
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">

                            <!-- mobile view -->
                            <div class="accordion accordion-boxed accordion-plus d-md-none d-block">
                                <div class="card border-no">
                                    <div class="card-header">
                                        <a href="#footer-menu1" class="expand"> <span class="cstb">Customer Service</span> </a>
                                    </div>
                                    <div id="footer-menu1" class="card-body collapsed">
                                        <ul class="widget-body">
                                            <li>
                                                <a href="#">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="#">Track Order</a>
                                            </li>
                                            <!-- <li>
                                                <a href="https://breadandbeyondbd.com/customer/profile">My Accounts</a>
                                            </li> -->
                                            <li>
                                                <a href="#">Reward Points</a>
                                            </li>
                                            <li>
                                                <a href="#">Make Payments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- desktop view -->
                            <div class="widget d-md-block d-none">
                                <h4 class="widget-title"><span class="cstb">Customer Service</span></h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="#">Track Order</a>
                                    </li>
                                    <!-- <li>
                                        <a href="https://breadandbeyondbd.com/customer/profile">My Accounts</a>
                                    </li> -->
                                    <li>
                                        <a href="#">Reward Points</a>
                                    </li>
                                    <li>
                                        <a href="#">Make Payments</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <!-- mobile view -->
                            <div class="accordion accordion-boxed accordion-plus d-md-none d-block">
                                <div class="card border-no">
                                    <div class="card-header">
                                        <a href="#footer-menu2" class="expand"><span class="cstb">Quick Links</span></a>
                                    </div>
                                    <div id="footer-menu2" class="card-body collapsed">
                                        <ul class="widget-body">
                                            <li>
                                                <a href="#">Create A Cake</a>
                                            </li>
                                            <li>
                                                <a href="#">Corporate Catering</a>
                                            </li>
                                            <li>
                                                <a href="#">Locate Us</a>
                                            </li>
                                            <li>
                                                <a href="#">Career</a>
                                            </li>
                                            <!-- <li>
                                                <a href="https://breadandbeyondbd.com/pages/offers">Offers</a>
                                            </li> -->
                                            <!--	<li>
                                        <a href="#">Terms &amp; Conditions</a>
                                    </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- desktop view -->
                            <div class="widget d-md-block d-none">
                                <h4 class="widget-title"><span class="cstb">Quick Links</span></h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">Create A Cake</a>
                                    </li>
                                    <li>
                                        <a href="#">Corporate Catering</a>
                                    </li>
                                    <li>
                                        <a href="#">Locate Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Career</a>
                                    </li>
                                    <!-- <li>
                                        <a href="https://breadandbeyondbd.com/pages/offers">Offers</a>
                                    </li> -->
                                    <!--	<li>
                                        <a href="#">Terms &amp; Conditions</a>
                                    </li> -->
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <!-- mobile view -->
                            <div class="accordion accordion-boxed accordion-plus d-md-none d-block">
                                <div class="card border-no">
                                    <div class="card-header">
                                        <a href="#footer-menu3" class="expand"><span class="cstb">About Us</span></a>
                                    </div>
                                    <div id="footer-menu3" class="card-body collapsed">
                                        <ul class="widget-body">
                                            <li>
                                                <a href="#">Our Story</a>
                                            </li>
                                            <li>
                                                <a href="#">Terms &amp; Conditions</a>
                                            </li>
                                            <li>
                                                <a href="#">Refund &amp; Return</a>
                                            </li>
                                            <li>
                                                <a href="#">Privacy Policy</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- desktop view -->
                            <div class="widget d-md-block d-none">
                                <h4 class="widget-title"><span class="cstb">About Us</span></h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">Our Story</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Refund &amp; Return</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end Top Footer -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="text-center copyright cst"><i class="fas fa-shield-alt"></i> 100% Secure Payment</p>

                <figure class="payment">
                    <img src="{{ asset('images/homepage/ssl-footer.webp') }}" alt="payment" width="300" height="90" />
                </figure>

            </div>

            <div class="footer-center">
                <p class="copyright cst">&copy; 2024 All Rights Reserved</p>
            </div>

            <div class="footer-right">
                <div class="social-links">
                    <a href="#" target="_blank" style="padding: 2px; width: 32px; height: 32px; display: inline-block; text-align: center;">
                        <i class="fa-brands fa-square-facebook" style="font-size: 32px;"></i>
                    </a>
                    <a href="#" target="_blank" style="padding: 2px; width: 32px; height: 32px; display: inline-block; text-align: center;">
                        <i class="fa-brands fa-square-whatsapp" style="font-size: 32px;"></i>
                    </a>
                    <a href="#" target="_blank" style="padding: 2px; width: 32px; height: 32px; display: inline-block; text-align: center;">
                        <i class="fa-brands fa-square-instagram" style="font-size: 32px;"></i>
                    </a>
                    <a href="#" target="_blank" style="padding: 2px; width: 32px; height: 32px; display: inline-block; text-align: center;">
                        <i class="fa-brands fa-square-youtube" style="font-size: 32px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
