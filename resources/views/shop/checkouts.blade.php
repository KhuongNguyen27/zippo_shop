@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<section class="page-title p_relative centred">
    <div class="auto-container">
        <div class="content-box">
            <h1 class="d_block fs_60 lh_70 fw_bold mb_10">Checkout Page</h1>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- checkout-section -->
<section class="checkout-section p_relative pt_140 pb_150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                <div class="inner-box">
                    <div class="billing-info p_relative d_block mb_55">
                        <h4 class="sub-title d_block fs_30 lh_40 mb_25">Billing Details</h4>
                        <form action="#" method="post" class="billing-form p_relative d_block">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2">User
                                        Name*</label>
                                    <div class="field-input">
                                        <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2"> Day of
                                        Birth*</label>
                                    <div class="field-input">
                                        <input type="date" value="{{ $user->day_of_birth }}" name="day_of_birth">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label
                                        class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Address*</label>
                                    <div class="field-input">
                                        <input type="text" value="{{ $user->address }}" name="address"
                                            class="col-12 form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label
                                        class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Email*</label>
                                    <div class="field-input">
                                        <input type="email" value="{{ $user->email }}" name="email"
                                            class="col-12 form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Phone
                                        Number*</label>
                                    <div class="field-input">
                                        <input type="text" value="{{ $user->phone }}" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Note*</label>
                                    <div class="field-input">
                                        <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                    <div class="payment-info p_relative d_block pt_45 pr_50 pb_50 pl_50 bg-light">
                                        <div class="btn-link">
                                            <a class="theme-btn theme-btn-eight store-order">Place Your Order </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 right-column ">
                <div class="inner-box">
                    <div class="order-info p_relative d_block pt_45 pr_50 pb_25 pl_50 mb_50 bg-light">
                        <h4 class="sub-title d_block fs_24 lh_30 mb_25">Your Order</h4>
                        <div class="order-product">
                            <ul class="order-list clearfix">
                                <li class="p_relative d_block clearfix pt_17 pb_16">
                                    <table class='w-100' style="padding-left: 0px;padding-right: 0px;">
                                        @php
                                        $totalAll=0;
                                        @endphp
                                        @foreach($carts as $cart)
                                        @php
                                        $total =
                                        $cart['quantity']*($cart['price']-(($cart['price']/100)*$cart['discount']));
                                        $totalAll += $total;
                                        @endphp
                                        <tr>
                                            <td class='text-left'>{{ $cart['name'] }}</td>
                                            <td class='text-center'>{{ $cart['quantity'] }}</td>
                                            <td class='text-right'><b>{{ number_format($total).' VND' }}</b></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </li>
                                <li class="order-total p_relative d_block clearfix pt_17 pb_16">
                                    <h6 class="fs_16 fw_bold lh_20 pull-left">Order Total</h6>
                                    <span
                                        class="p_relative d_block pull-right fs_15 fw_bold font_family_inter color_black">{{ number_format($totalAll).' VND' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var url = "{{ route('zipposhop.storeorder') }}"
$(document).ready(function() {
    $('.store-order').click(function(e) {
        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(response) {
                console.log(response);
                alert('Place order success. Thank you <3')
                window.location.href = "{{ route('zipposhop.index') }}"
            })
            .fail(function() {
                alert('Place order fail. Please try again or contact admin')
            })
    })
})
</script>
@endsection