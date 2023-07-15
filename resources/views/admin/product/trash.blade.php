@extends('Admin.master')
@section('content')
<a href="{{ route('product.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Discount</th>
        <th scope="col">Selled</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td class="w-25"><img class="img-thumbnail" src="{{ asset($product->image) }}" alt=""></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->discount }}</td>
        <td>{{ $product->selled }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('product.restore', $product->id) }}"
                    onclick="return confirm('Do u want to restore record?');" class="btn btn-primary">Restore
                </a>
                <a href="{{ route('product.deleteforever', $product->id) }}"
                    onclick="return confirm('Do u want to delete forever record?');" class="btn btn-danger">
                    Detroy</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection