@extends('admin.master')
@section('content')
<script>
var products = @json($products -> keyBy('id') -> map(function($product) {
    return ['quantity' => $product -> quantity, 'max_quantity' => $product -> max_quantity];
}));
</script>
<form action="{{ route('orderdetail.update',$detail->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Order detail create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-label">Order</label>
                    <input type="hidden" name="order_id" value="{{ $detail->order_id }}">
                    <input type="text" class="form-control form-control-user"
                        value="{{ $detail->order_id }} : {{ $detail->order->customer->name }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Product</label>
                    <select class="form-control form-control-user" name="product_id" id="product-select">
                        <option value="{{ $detail->product->id}}"> {{ $detail->product->id}} : {{ $detail->product->name}}</option>
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
                    <input type="number" name="quantity" class="form-control quantity" min="1" max="" />
                </div>
                <a href="{{ route('order.show',$detail->order_id) }}" class='btn btn-primary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
<script>
document.querySelector('.quantity').addEventListener('input', function() {
    var productName = document.getElementById('product-select').value;
    var product = products[productName];
    if (product) {
        var maxQuantity = parseInt(product.quantity);
        var quantity = parseInt(this.value);
        if (!isNaN(quantity) && quantity > maxQuantity) {
            this.value = maxQuantity;
        }
    }
});
</script>
@endsection