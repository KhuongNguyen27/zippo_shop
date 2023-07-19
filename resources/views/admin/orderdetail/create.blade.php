@extends('admin.master')
@section('content')
<form action="{{ route('orderdetail.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <div class="form-group">
            <label class="form-label">Order</label>
            <input type="hidden" name="order_id" value="{{ $order_id }}">
            <input type="text" class="form-control form-control-user" name="order_id" value="{{ $order_id }}" disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Product</label>
            <select class="form-control form-control-user" name="product_id" id="product-select">
    <option>Select product...</option>
    @foreach($products as $product)
    <option value="{{ $product->id }}">{{ $product->id }} : {{ $product->name }}</option>
    @endforeach
</select>
            @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
        <input type="number" name="quantity" class="form-control quantity" min="1" max="" />
</div>

        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
<script>
    $(document).ready(function() {
        $('#product-select').change(function() {
            var product_id = $(this).val();
            if (product_id) {
                $.ajax({
                    url: '/get-max-quantity/' + product_id,
                    type: 'GET',
                    success: function(data) {
                        $('.quantity').attr('max', data.max_quantity);
                    }
                });
            } else {
                $('.quantity').attr('max', '');
            }
        });
    });
</script>
@endsection