@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<section class="shop-details p_relative pt_140 pb_80">
    <div class="auto-container">
        <div class="product-details-content p_relative d_block mb_100">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box shope-details-left-image p_relative d_block">
                        <figure class="image"><img src="{{ asset($product->image) }}" alt="parts"></figure>
                        <div class="preview-link p_absolute t_20 r_20"><a href="{{ asset($product->image) }}"
                                class="lightbox-image p_relative d_iblock fs_20 centred z_1 w_50 h_50 color_black lh_50"
                                data-fancybox="gallery"><i class="far fa-search-plus"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="product-details p_relative d_block ml_20">
                        <h2 class="d_block fs_30 lh_40 fw_sbold font_family_inter mb_5">{{ $product->name }}</h2>
                        <div class="text p_relative d_block mb_30">
                            <p class="font_family_poppins mb_25">{!! $product->description !!}</p>
                        </div>
                        <div class="addto-cart-box p_relative d_block mb_35">
                            <ul class="clearfix">
                                <li class="p_relative d_block float_left mr_10"><button type="button"
                                        class="theme-btn theme-btn-eight add-to-cart-btn"
                                        data-url="{{ route('zipposhop.addtocart',$product->id) }}">Add To Cart</button>
                                </li>
                            </ul>
                        </div>
                        <div class="other-option">
                            <ul class="list">
                                <li class="p_relative d_block fs_16 font_family_poppins mb_5"><span
                                        class="fw_medium color_black">Product ID :</span> {{ $product->id }}</li>
                                <li class="p_relative d_block fs_16 font_family_poppins mb_5"><span
                                        class="fw_medium color_black">Category :</span> {{ $product->category->name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-discription p_relative d_block mb_80">
            <div class="tabs-box">
                <div class="tab-btn-box p_relative d_block mb_35">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn p_relative d_iblock fs_18 font_family_inter lh_20 float_left fw_medium z_1 mr_35 tran_5"
                            data-tab="#tab-1">Description</li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="content-box">
                            <p class="font_family_poppins mb_25"></p>
                            <p class="font_family_poppins ">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product shop-page-2 shop-page-section">
            <div class="title-text mb_25">
                <h2 class="d_block fs_30 lh_40 fw_sbold">Related Products</h2>
            </div>
            <div class="row clearfix">
                @foreach($products as $product)
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="product-block-one item-block-one">
                        <div class="ribon fs_13">{{ $product->discount }}%</div>
                        <div class="product-block-one-image" style="border-style:none">
                            <div class="image"><img src="{{ asset($product->image) }}" alt="parts">
                            </div>
                        </div>
                        <div class="product-block-one-cintent">
                            <h4 class="fs_15"><a href="#">{{ $product->name }}</a></h4>
                            <div class="price-container d-flex justify-content-center">
                                <div class="price fs_15 fw_medium mt-2"><span
                                        style="color:red">{{ number_format($product->price) }} VNĐ</span></div>
                                <div class="price-cart"><a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-block-one-heart">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                    </svg></i>
                            </div>
                        </div>
                        <div class="overlay">
                            <ul>
                                <li><span>Wishlist </span><a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path
                                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                        </svg></i></li>
                                <!-- <li><span>Compare</span><a
                                            href="{{ asset('shop/images/shop/product/image-33.png') }}"
                                            class="lightbox-image" data-fancybox="gallery">
                                            <i class="icon-left-right-arrow"></i></a></li> -->
                                <li><span>Quick View </span> <a href="{{ route('zipposhop.show',$product->id) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('shop/js/cart.js') }}"></script>
@endsection