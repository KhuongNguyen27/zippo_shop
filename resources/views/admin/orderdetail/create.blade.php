@extends('admin.master')
@section('content')
<script>
var products = @json($products -> keyBy('id') -> map(function($product) {
    return ['quantity' => $product -> quantity, 'max_quantity' => $product -> max_quantity];
}));
</script>
<form action="{{ route('orderdetail.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Order detail create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Order</label>
                        <input type="hidden" name="order_id" value="{{ $order_id }}">
                        <input type="text" class="form-control form-control-user" name="order_id"
                            value="{{ $order_id }}" disabled>
                    </div>
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
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control quantity" min="1" max="" />
                </div>
                <a href="{{ route('order.show',$order_id) }}" class='btn btn-primary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
<script>
// Lắng nghe sự kiện khi select được thay đổi
// Lắng nghe sự kiện khi input quantity thay đổi
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