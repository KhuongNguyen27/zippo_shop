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
                        <a href="{{ route('product.index') }}" class='btn btn-primary'>Back</a>
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
                                    <td class="w-25"><img class="img-thumbnail" src="{{ asset($product->image) }}"
                                            alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->discount.'%' }}</td>
                                    <td>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}
                                    </td>
                                    <td>{{ $product->selled }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('product.restore', $product->id) }}"
                                                onclick="return confirm('Do u want to restore record?');"
                                                class="btn btn-primary">Restore
                                            </a>
                                            <a href="{{ route('product.deleteforever', $product->id) }}"
                                                onclick="return confirm('Do u want to delete forever record?');"
                                                class="btn btn-danger">
                                                Detroy</a>
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