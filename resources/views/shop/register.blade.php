@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<section class="checkout-section p_relative pt_80 pb_150 ">
    <div class="container">
        <h2 class="suxb-title d_block fs_30 lh_40 mb_25 text-center" style="font-size:45px">Register </h2>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-lg-7 col-md-12 col-sm-12 bg-light p-5 rounded">
                <div class="inner-box">
                    <div class="billing-info p_relative d_block">
                        <form action="{{ route('zipposhop.store') }}" method="post"
                            class="billing-form p_relative d_block">
                            @csrf
                            <div class="row">
                                @if (Session::has('register-fail'))
                                <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                                    <div class="register-fail">
                                        <p class="alert alert-primary">{{ Session::get('register-fail') }}</p>
                                    </div>
                                </div>
                                @endif
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2">User
                                            Name*</label>
                                        <div class="field-input">
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2"> Day of
                                            Birth*</label>
                                        <div class="field-input">
                                            <input type="date" name="day_of_birth">
                                            @error('day_of_birth')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label
                                            class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Address*</label>
                                        <div class="field-input">
                                            <input type="text" name="address" class="col-12 form-control">
                                            @error('address')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label
                                            class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Email*</label>
                                        <div class="field-input">
                                            <input type="email" name="email" class="col-12 form-control">
                                            @error('email')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Phone
                                            Number*</label>
                                        <div class="field-input">
                                            <input type="text" name="phone" class="form-control">
                                            @error('phone')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label
                                            class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Gender*</label>
                                        <div class="select-column select-box">
                                            <select class="selectmenu" name='gender'>
                                                <option selected="selected">Select Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="0">Another</option>
                                            </select>
                                        </div>
                                        <div class="field-input">
                                            @error('gender')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label
                                            class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Password*</label>
                                        <div class="field-input">
                                            <input type="password" name="password" class="col-12 form-control">
                                            @error('password')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label class="p_relative d_block fs_16 font_family_poppins color_black mb_2">Repeat
                                            Password*</label>
                                        <div class="field-input">
                                            <input type="password" name="repeatpassword" class="col-12 form-control">
                                            @error('repeatpassword')
                                            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary" value="Create Account">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>
@endsection