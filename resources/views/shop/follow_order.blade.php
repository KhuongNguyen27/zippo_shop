@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<!-- Page Title -->
<section class="page-title p_relative centred">
    <div class="auto-container">
        <div class="content-box">
            <h1 class="d_block fs_60 lh_70 fw_bold mb_10">Cart Page</h1>
            <ul class="bread-crumb p_relative d_block mb_8 clearfix">
                <li class="p_relative d_iblock fs_16 lh_25 fw_sbold font_family_inte mr_20"><a
                        href="{{ route('zipposhop.index')}}">Home</a></li>
                <li class="current p_relative d_iblock fs_16 lh_25 fw_sbold font_family_inte"><a
                        href="{{ route('zipposhop.cart') }}">Cart Page</a></li>
                <li class="current p_relative d_iblock fs_16 lh_25 fw_sbold font_family_inte ml-3">Order</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- cart section -->
<section class="cart-section p_relative pt_140 pb_150">
    <div class="auto-container">
        <div class="row clearfix">
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <th colspan="6" class='text-left'>Order ID : {{$order->id}}</br>Note : {{$order->note}}</th>
                    </tr>
                    @foreach($order->orderdetail as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->product->price).' VND' }}</td>
                        <td>{{ number_format($detail->product->discount).' %' }}</td>
                        <td>{{ number_format($detail->total).' VND' }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            @if($order->status == 1)
                                complete                                
                            @else
                                in process...
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- cart section end -->
@endsection