<header class="main-header ex_shop_header header-style-one">
    <!-- Header Top -->
    <!-- <div class="header-top">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="left-column">
                    <ul class="contact-info">
                        <li><a href="#0">About Us </a></li>
                        <li><a href="#0">My account</a></li>
                        <li><a href="#0">Order Tracking</a></li>
                        <li><a href="#0">Wishlist</a></li>
                    </ul>
                </div>
                <div class="right-column">
                    <div class="help-info">
                        Need help? <span> Call us: </span> <a href="tel:+8001234567890" class="help-info-number"> (+800)
                            1234 5678 90</a> <span> or </span> <a href="mailto:info@company.com"> info@company.com</a>
                    </div>
                    <div class="curency">
                        <div class="language">
                            <span class="flag"><img src="{{ asset('shop/images/icons/flag.png') }}" alt="flag"></span>
                            <select class="selectpicker" name="make">
                                <option value="*">English</option>
                                <option value=".category-1">Spanish</option>
                                <option value=".category-3">French</option>
                                <option value=".category-4">Chinese</option>
                            </select>
                        </div>
                        <div class="currency">
                            <select class="selectpicker" name="make">
                                <option value="*">USD</option>
                                <option value=".category-1">EURO</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container col-12">
                <!--Logo-->
                <div class="logo_menu col-10">
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('zipposhop.index') }}"><img
                                    src="{{ asset('shop/images/logo-1.png') }}" alt="logo"></a></div>
                    </div>
                    <div class="menu-area clearfix">
                        <nav class="main-menu clearfix navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix home-menu">
                                    <li><a href="#">Home </a></li>
                                    <li class="dropdown"><a href="#">Products</a>
                                        <ul class="sub-dropdown">
                                            @foreach($categories as $category)    
                                            <li><a href="#">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="#">Knowledge</a></li>
                                    <li><a href="#">Sell & Check Out</a></li>
                                    <li><a href="#">Contact </a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <ul class="right-info col-2" style=" padding-right: 0px; padding-left: 0px; ">
                    <li>
                        <div onclick="window.location.href='{{ route('zipposhop.cart') }}';" class="shopping-cart"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket" viewBox="0 0 16 16">
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                            </svg><span class="count cart-quantity"> {{ count((array) session('cart')) }}</span></div>
                    </li>
                    <li>
                    <li>
                        @if(isset(Auth::guard('customers')->user()->name))
                        <button class="col-12" style="margin-left: 10px; text-align: center; position: inherit;"><a
                                href="{{ route('zipposhop.logout') }}" style="color:black">{{ Auth::guard('customers')->user()->name }}</a></button>
                        @else
                        <button class="col-12 btn btn-light"
                            style="margin-left: 10px; text-align: center; position: inherit;"><a
                                href="{{ route('zipposhop.login') }}" style="color:black">Login</a></button>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- header-lower -->
    <!-- <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="menu-area clearfix">
                    <div class="shop-category"><a href="#"><span class="flaticon-menu"></span>Browse categories</a>
                        <ul class="sidebar-dropdown">
                            <li class="dropdown"><a href="#"><i class="icon-tair"></i> Fuel Parts</a>
                                <ul>
                                    <li><a href="#"><i class="icon-shock-absorber"></i>Fuel Parts 01</a></li>
                                    <li><a href="#"><i class="icon-shock-absorber"></i>Fuel Parts 02</a></li>
                                    <li><a href="#"><i class="icon-shock-absorber"></i>Fuel Parts 03</a></li>
                                    <li><a href="#"><i class="icon-shock-absorber"></i>Fuel Parts 04</a></li>
                                    <li><a href="#"><i class="icon-shock-absorber"></i>Fuel Parts 05</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"><i class="icon-shock-absorber"></i>Transmission Parts</a>
                                <ul>
                                    <li><a href="#"><i class="icon-car-insurance"></i>Transmission Parts 01</a></li>
                                    <li><a href="#"><i class="icon-car-insurance"></i>Transmission Parts 02</a></li>
                                    <li><a href="#"><i class="icon-car-insurance"></i>Transmission Parts 03</a></li>
                                    <li><a href="#"><i class="icon-car-insurance"></i>Transmission Parts 04</a></li>
                                    <li><a href="#"><i class="icon-car-insurance"></i>Transmission Parts 05</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"><i class="icon-repair"></i>Engine Parts</a>
                                <ul>
                                    <li><a href="#"><i class="icon-car-battery"></i>Engine Parts 01</a></li>
                                    <li><a href="#"><i class="icon-car-battery"></i>Engine Parts 02</a></li>
                                    <li><a href="#"><i class="icon-car-battery"></i>Engine Parts 03</a></li>
                                    <li><a href="#"><i class="icon-car-battery"></i>Engine Parts 04</a></li>
                                    <li><a href="#"><i class="icon-car-battery"></i>Engine Parts 05</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="icon-tair"></i>Wheels & Tires</a></li>
                            <li><a href="#"><i class="icon-car-insurance"></i>Shock Absorber Sale</a></li>
                            <li><a href="#"><i class="icon-car-battery"></i>Motorcycle Boots</a></li>
                            <li class="dropdown">
                                <a href="#"><i class="icon-shock-absorber"></i>Vehicle Types</a>
                                <ul>
                                    <li><a href="#"><i class="icon-scooter"></i>Vehicle Types 01</a></li>
                                    <li><a href="#"><i class="icon-scooter"></i>Vehicle Types 02</a></li>
                                    <li><a href="#"><i class="icon-scooter"></i>Vehicle Types 03</a></li>
                                    <li><a href="#"><i class="icon-scooter"></i>Vehicle Types 04</a></li>
                                    <li><a href="#"><i class="icon-scooter"></i>Vehicle Types 05</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                </div>
                <div class="search-box">
                    <form>
                        <input type="search" placeholder="Search products">
                        <button type="submit"><i class="icon-magnifing-glass"></i></button>
                    </form>
                </div>
                <div class="navbar-right-info">
                    <ul class="right-info">
                        <li>
                            <div class="shopping-cart"><i class="icon-heart"></i><span class="count">0</span></div>
                        </li>
                        <li class="search-toggler"><i class="icon-left-right-arrow"></i></li>
                        <li><a href="#"><i class="icon-user"></i>
                                <p>My Account <span>Hello, Sign in</span></p>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <div class="logo"><a href="{{ route('zipposhop.index') }}"><img
                                src="{{ asset('shop/images/logo.png') }}" alt="logo"></a></div>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{ route('zipposhop.index') }}"><img
                        src="{{ asset('shop/images/logo.png') }}" alt="logo" title=""></a></div>
            <div class="menu-outer">
            </div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#0"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#0"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#0"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="#0"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#0"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>