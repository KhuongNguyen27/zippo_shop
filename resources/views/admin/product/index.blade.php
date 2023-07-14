@extends('Admin.master')
@section('content')
@include('sweetalert::alert')
<a href="{{ route('product.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Discount</th>
        <th scope="col">Selled</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <?php 
        ?>
        <td>{{ $product->id }}</td>
        <td class="w-25"><img class="img-thumbnail" src="{{ asset($product->image) }}" alt=""></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->discount_price }}</td>
        <td>{{ $product->selled }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('product.edit', $product->id) }}" class='btn btn-primary'>Edit</a>
                <form action="{{ route('product.destroy',$product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection