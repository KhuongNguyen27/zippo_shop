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
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                    <div class="field-input  w-50">
                                        <input type="submit" class="btn btn-danger w-100 mt-5" value="Change">
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
                    <div class="payment-info p_relative d_block pt_45 pr_50 pb_50 pl_50 bg-light">
                        <h4 class="sub-title d_block fs_24 lh_30 mb_40">Payment</h4>
                        <!-- <div class="payment-inner p_relative d_block pt_25 pr_30 pb_20 pl_30 mb_30">
                            <div class="option-block pb_12 mb_13">
                                <div class="check-box">
                                    <input class="check" type="checkbox" id="checkbox2" checked>
                                    <label for="checkbox2" class="fs_16 fw_medium font_family_inter color_black">Direct
                                        Bank Transfer</label>
                                </div>
                                <p class="fs_14 font_family_poppins pl_30">Please send a check to Store Name, Store
                                    Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                            <div class="option-block clearfix">
                                <div class="check-box pull-left mr_25">
                                    <input class="check" type="checkbox" id="checkbox3">
                                    <label for="checkbox3"
                                        class="fs_16 fw_medium font_family_inter color_black">Paypal</label>
                                </div>
                                <div class="link pull-left">
                                    <a href="checkout.html" class="fs_16 fw_medium font_family_inter color_black">What
                                        is Paypal?</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="btn-link">
                            <a class="theme-btn theme-btn-eight store-order" >Place Your Order </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var url = "{{ route('zipposhop.storeorder') }}"
    $(document).ready(function(){
        $('.store-order').click(function(e){
            $.ajax({
                url: url,
                type: "get",
            })
            .done(function(response){
                console.log(response);
                alert('Place order success. Thank you <3')
                window.location.href= "{{ route('zipposhop.index') }}"
            })
            .fail(function(){
                alert('Place order fail. Please try again or contact admin')
            })
        })
    })
</script>
@endsection