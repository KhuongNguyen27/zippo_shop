@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<section class="checkout-section p_relative pt_80 pb_150 ">
    <div class="container">
        <h2 class="suxb-title d_block fs_30 lh_40 mb_25 text-center" style="font-size:45px">Forgot Password </h2>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-lg-7 col-md-12 col-sm-12 bg-light p-5 rounded">
                <div class="inner-box">
                    <div class="billing-info p_relative d_block">
                        <form action="{{ route('zipposhop.postforgot') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>
@endsection