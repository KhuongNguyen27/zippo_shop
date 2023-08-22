@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<!-- banner -->
<section class="banner banner-one">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-9">
                <div class="banner-left-container">
                    <div class="banner-carousel owl-carousel owl-theme">
                        <div class="banner-item">
                            <div class="banner-content">
                                <h6>This Week Only for World Premier</h6>
                                <h2>New Top Product <br> High Quality</h2>
                                <div class="btn-box clearfix">
                                    <a href="#" class="theme-btn btn-style-one">Shop Now
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-item">
                            <div class="banner-content">
                                <h6>This Week Only for World Premier</h6>
                                <h2>Luxury <br> High Quality</h2>
                                <div class="btn-box clearfix">
                                    <a href="#" class="theme-btn btn-style-one">Shop Now<svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-3">
                <div class="banner-right-container">
                    <div class="banner-right-container-top">
                        <div class="banner-right-car">
                            <img src="{{ asset('shop/images/icons/car-1.png') }}') }}" alt="car">
                        </div>
                        <div class="banner-right-title">
                            <h6>Over 22500 Zippo.</h6>
                            <h5>Find Your Auto Parts</h5>
                        </div>
                    </div>
                    <div class="select-container">
                        <select name="make">
                            <option value="*">Select Make </option>
                            <option value=".category-1">Make 01</option>
                            <option value=".category-2">Make 02</option>
                            <option value=".category-3">Make 03</option>
                        </select>
                        <select name="make">
                            <option value="*">Select Model </option>
                            <option value=".category-1">Make 01</option>
                            <option value=".category-2">Make 02</option>
                            <option value=".category-3">Make 03</option>
                        </select>
                        <select name="make">
                            <option value="*">Select Year </option>
                            <option value=".category-1">Make 01</option>
                            <option value=".category-2">Make 02</option>
                            <option value=".category-3">Make 03</option>
                        </select>
                        <select name="make">
                            <option value="*">Select Options </option>
                            <option value=".category-1">Make 01</option>
                            <option value=".category-2">Make 02</option>
                            <option value=".category-3">Make 03</option>
                        </select>
                    </div>
                    <div class="select-btn">
                        <a href="#" class="theme-btn btn-style-one d-flex justify-content-center">Find Auto Parts<i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                    <div class="select-shape">
                        <img src="{{ asset('shop/images/shape/select-shape.png') }}') }}" alt="shape">
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- banner -->
<div class="row row-collapse align-center m-5">
    <div class="col medium-4 large-4">
        <div class="col-inner text-center">
            <div class="icon-box featured-box icon-box-left text-left is-small d-flex" style="margin:0px 0px 0px 16px;">
                <div class="icon-box-img" style="width: 42px">
                    <div class="icon">
                        <div class="icon-inner">
                            <img width="42" height="38"
                                src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_1111.png"
                                class="attachment-medium size-medium entered lazyloaded" alt="xe máy" decoding="async"
                                data-lazy-src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_1111.png"
                                data-ll-status="loaded"><noscript><img width="42" height="38"
                                    src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_1111.png"
                                    class="attachment-medium size-medium" alt="xe máy" decoding="async" /></noscript>
                        </div>
                    </div>
                </div>
                <div class="icon-box-text last-reset ml-3">
                    <p style='font-size:16px; color:#550000	;'>Nationwide delivery</p>
                    <p style='font-size:14px;'>Inspect before paying for new merchandise</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col medium-4 large-4">
        <div class="col-inner">
            <div class="icon-box featured-box icon-box-left text-left is-small d-flex" style="margin:0px 0px 0px 16px;">
                <div class="icon-box-img" style="width: 42px">
                    <div class="icon">
                        <div class="icon-inner">
                            <img width="42" height="38"
                                src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_2111.png"
                                class="attachment-medium size-medium entered lazyloaded" alt="điện thoại"
                                decoding="async"
                                data-lazy-src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_2111.png"
                                data-ll-status="loaded"><noscript><img width="42" height="38"
                                    src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_2111.png"
                                    class="attachment-medium size-medium" alt="điện thoại"
                                    decoding="async" /></noscript>
                        </div>
                    </div>
                </div>
                <div class="icon-box-text last-reset  ml-3">
                    <p style='font-size:16px; color:#550000	;'>Super-fast ordering</p>
                    <p style='font-size:14px;'>Call now: <span
                            style="color: #ed1c24;"><strong>0947.964.559</strong></span> order and receive advice
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col medium-4 large-4">
        <div class="col-inner">
            <div class="icon-box featured-box icon-box-left text-left is-small d-flex" style="margin:0px 0px 0px 16px;">
                <div class="icon-box-img" style="width: 50px">
                    <div class="icon">
                        <div class="icon-inner">
                            <img width="50" height="38"
                                src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_3111.png"
                                class="attachment-medium size-medium entered lazyloaded" alt="chính sách"
                                decoding="async"
                                data-lazy-src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_3111.png"
                                data-ll-status="loaded"><noscript><img width="42" height="38"
                                    src="https://www.zippovn.vn/wp-content/uploads/2018/06/srv_3111.png"
                                    class="attachment-medium size-medium" alt="chính sách"
                                    decoding="async" /></noscript>
                        </div>
                    </div>
                </div>
                <div class="icon-box-text last-reset ml-3">
                    <p style='font-size:16px; color:#550000	;'>Genuine Zippo</p>
                    <p style='font-size:14px;'>Money-back if Zippo is detected</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cta -->
<section class="cta">
    <div class="auto-container">
        <div class="cta-container">
            <div class="cta five-item-carousel owl-carousel owl-theme">
                @foreach($categories as $category)
                <div class="cta-content">
                    <div class="cta-image">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ asset($category->image) }}"
                            alt="parts">
                    </div>
                    <div class="cta-info">
                        <h5>{{ $category->name }}</h5>
                        <!-- <h6>4 devices</h6> -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- cta -->
<div id="data-wrapper">
    <div class="col-12 text-center m-5">
        <h2>Products</h2>
    </div>
        @include('shop.product_home')
</div>

<div class="col-12 text-center m-3">
    <button class="btn btn-success load-more-product">Show more</button>
</div>
<div class="auto-load text-center ml-3" style=" display: none;">
    <div class="d-flex justify-content-center">
        <div role="status">
            <span>Loading...</span>
        </div>
    </div>
</div>
<script>
    var ENDPOINT = "{{ route('zipposhop.index') }}"
    var page = 1;
    $(".load-more-product").click(function() {
        page++;
        LoadMore(page);
    });

    function LoadMore(page) {
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                },
            })
            .done(function(response) {
                // console.log(response.html);
                if (response.html == '') {
                    $('.auto-load').html("End :(");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append("<div class='row m-5'>" + response.html + "</div>");
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Sever error occured');
            });
    }
</script>
@endsection