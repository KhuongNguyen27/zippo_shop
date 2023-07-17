@extends('Admin.master')
@section('content')
@include('sweetalert::alert')
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