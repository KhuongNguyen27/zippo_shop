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
                <li class="current p_relative d_iblock fs_16 lh_25 fw_sbold font_family_inte">Cart Page</li>
                @if(Auth::guard('customers')->user())
                <li class="current p_relative d_iblock fs_16 lh_25 fw_sbold font_family_inte ml-3"><a
                        href="{{ route('zipposhop.follow_order') }}">Order</a></li>
                @endif
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- cart section -->
<section class="cart-section p_relative pt_140 pb_150">
    <div class="auto-container">
        <div class="row clearfix">
            @if (Session::has('cart'))
            <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                @php
                $carts = Session::get('cart');
                $totalAll = 0;
                @endphp
                <div class="table-outer">
                    <table class="cart-table w-100">
                        <thead class="cart-header">
                            <tr>
                                <th class="text-center">Image</th>
                                <th>&nbsp;</th>
                                <th class="text-center">Product Name</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th class="quantity">Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td class="w-25">
                                    <img class="img-thumbnail w-50" style="margin-left: 25%; object-fit: cover;"
                                        src="{{ asset($cart['image']) }}" alt="parts">
                                </td>
                                <td colspan="4" class="prod-column text-center">
                                    <div class="column-box">
                                        <div class="prod-title">
                                            {{ $cart['name'] }}
                                        </div>
                                    </div>
                                </td>
                                <td class="data-price" data-price="{{ $cart['price'] }}">
                                    {{ number_format($cart['price']).' VND' }}</td>
                                <td class="data-discount" data-discount="{{ $cart['discount'] }}">
                                    {{ number_format($cart['discount']).'%' }}</td>
                                <td class="qty">
                                    <div class="item-quantity">
                                        <input class="quantity" type="number" value="{{ $cart['quantity'] }}"
                                            name="quantity" min=1 max="{{ $cart['max'] }}">
                                    </div>
                                </td>
                                @php
                                $total = $cart['quantity']*($cart['price']-(($cart['price']/100)*$cart['discount']));
                                $totalAll += $total;
                                @endphp
                                <td class="sub-total">{{ number_format($total).' VND' }}</td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-outline-info btn-sm update-cart" data-id="{{ $cart['id'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                            <path
                                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm remove-from-cart"
                                        data-id="{{ $cart['id'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path
                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        @if (count($cart)>0)
        <div class="cart-total">
            <div class="row">
                <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                    <div class="total-cart-box clearfix text-right" style="line-height:200%">
                        <h3 class="fs_24 fw_sbold lh_30 d_block m-3">Cart Totals</h3>
                        <ul class="list clearfix mb_30">
                            <li>Order Total : <span>{{ number_format($totalAll).' VND' }}</span></li>
                        </ul>
                        <a class="theme-btn theme-btn-eight" href="{{ route('zipposhop.checkouts') }}">Proceed to
                            Checkout </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<script type="text/javascript">
$(document).ready(function() {
    $(".update-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('zipposhop.updatecart') }}',
            method: "put",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
})
$(".remove-from-cart").click(function(e) {
    e.preventDefault();
    var ele = $(this);
    if (confirm("Are u sure?")) {
        $.ajax({
            url: '{{ route('zipposhop.removefromcart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id")
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }
});
</script>
<!-- cart section end -->
@endsection