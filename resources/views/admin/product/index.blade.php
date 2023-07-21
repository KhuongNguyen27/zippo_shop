@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product Table</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('product.create') }}" class='btn btn-primary'>Create</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Price</th>
                                    <th>Selled</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td class="w-25"><img class="img-thumbnail" src="{{ asset($product->image) }}" alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->discount.'%' }}</td>
                                    <td>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</td>
                                    <td>{{ $product->selled }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class='btn btn-primary'>Edit</a>
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
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection