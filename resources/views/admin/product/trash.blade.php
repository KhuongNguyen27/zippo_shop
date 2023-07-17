@extends('Admin.master')
@section('content')
<a href="{{ route('product.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
<tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Information</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td class="w-25"><img class="img-thumbnail" src="{{ asset($product->image) }}" alt=""></td>
        <td>
            <b>Name product : </b>{{ $product->name }}</br>
            <b>Description : </b>{{ $product->description }}</br>
            <b>Category : </b>{{ $product->category->name }}</br>
            <b>Quantity : </b>{{ $product->quantity }}</br>
            <b>Discount : </b>{{ $product->discount }}</br>
            <b>Price : </b>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</br>
            <b>Selled : </b>{{ $product->selled }}</td>
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