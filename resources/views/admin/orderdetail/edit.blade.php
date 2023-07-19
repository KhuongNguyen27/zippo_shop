@extends('admin.master')
@section('content')
<form action="{{ route('orderdetail.update',$detail->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <div class="form-group">
            <label class="form-label">Order</label>
            <input type="text" class="form-control form-control-user" value="{{ $detail->order_id }} : {{ $detail->order->customer->name }}" disable>
            @error('order_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Product</label>
            <select class="form-control form-control-user" name="product_id" id="">
                <option value="{{ $detail->product->id }}" >{{ $detail->product->id }} : {{ $detail->product->name }}</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->id }} : {{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Quantity</label>
            <input type="number" min="0" max="20" class="form-control form-control-user" name="quantity" value="{{ $detail->quantity }}">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
@endsection