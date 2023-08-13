<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>Zippo Viet Nam</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('shop/images/shop/favicon.png') }}" type="image/x-icon">
    <!-- Stylesheets -->
    <!-- <link href="{{ asset('shop/css/font_awesome_all.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('shop/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/icomoon.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/hover.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/nice_select.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/jquery_ui.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/elpath.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/progresscircle.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/hover.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/preloader.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/time-travel.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/categories.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/dot_style_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/owl_nav_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/pagination.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/search_popup.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/header_top.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/header_upper.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/header_lower.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/menu_sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/mobile_menu.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/cta_section.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/feature_block_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/product_block_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/clients_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/newsletter_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/main_footer_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/footer_bottom_one.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/scroll_to_top.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/week_sale.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/add.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/element_css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
    .ml-4,.mx-4 {
        margin-left: 12.5rem !important;
    }
    </style>
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">

        <!-- preloader -->
        <!-- 
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader home-16"
                    style="background-image: url({{ asset('shop/images/banner/banner-2.jpg') }});">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="z" class="letters-loading" style="color:black; padding:2px;">
                                z
                            </span>
                            <span data-text-preloader="i" class="letters-loading" style="color:black; padding:2px;">
                                i
                            </span>
                            <span data-text-preloader="p" class="letters-loading" style="color:black; padding:2px;">
                                p
                            </span>
                            <span data-text-preloader="p" class="letters-loading" style="color:black; padding:2px;">
                                p
                            </span>
                            <span data-text-preloader="o" class="letters-loading" style="color:black; padding:2px;">
                                o
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box clearfix">
                    <figure class="logo-box pull-left"><a href="route('shop.master')"><img
                                src="{{ asset('shop/images/logo-1.png') }}" alt="logo"></a></figure>
                    <div class="close-search pull-right"><img src="{{ asset('shop/images/icons/close.png') }}"
                            alt="close"></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="route('shop.master')">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value=""
                                        placeholder="Type your keyword and hit" required>
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         -->
        <!-- preloader end -->

        @include('shop.include.header')

        @yield('content')

        @include('shop.include.footer')

        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>

    </div>



    <!-- jequery plugins -->
    <script src="{{ asset('shop/js/jquery.js') }}"></script>
    <!-- <script src="{{ asset('shop/js/popper.min.js') }}"></script> -->
    <!-- <script src="{{ asset('shop/js/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('shop/js/owl.js') }}"></script>
    <script src="{{ asset('shop/js/wow.js') }}"></script>
    <script src="{{ asset('shop/js/scrollbar.js') }}"></script>
    <script src="{{ asset('shop/js/validation.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.nice_select.min.js') }}"></script>
    <script src="{{ asset('shop/js/time_count.js') }}"></script>
    <script src="{{ asset('shop/js/appear.js') }}"></script>
    <script src="{{ asset('shop/js/progresscircle.js') }}"></script>
    <script src="{{ asset('shop/js/parallax_scroll.js') }}"></script>
    <script src="{{ asset('shop/js/jquery_ui.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('shop/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->

</html>