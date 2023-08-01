@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Product Table </h4>
                </div>
                <div class="card-body--">
                    <a href="{{ route('product.index') }}" class='btn btn-secondary'>Back</a>
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th class="serial">#</th>
                                <th class="avatar col-2">Avatar</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th class='text-center'>Quantity</th>
                                <th class='text-center'>Discount</th>
                                <th>Price</th>
                                <th class='text-center'>Selled</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="table-warning">
                                <td class="serial">{{ $product->id }}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <a href="#"><img class="img-thumbnail" src="{{ asset($product->image) }}"
                                                alt=""></a>
                                    </div>
                                </td>
                                <td><span class="name">{{ $product->name }}</span> </td>
                                <td>{{ $product->category->name }}</td>
                                <td class='text-center'>{{ $product->quantity }}</td>
                                <td class='text-center'>{{ $product->discount.'%' }}</td>
                                <td>{{ number_format($product->price)}}</td>
                                <td class="text-center">{{ $product->selled }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if (Auth::user()->hasPermission('Product_restore') )
                                        <a href="{{ route('product.restore', $product->id) }}"
                                            onclick="return confirm('Do u want to restore record?');"
                                            class="btn btn-info">Restore
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('Product_forceDelete') )
                                        <a href="{{ route('product.deleteforever', $product->id) }}"
                                            onclick="return confirm('Do u want to delete forever record?');"
                                            class="btn btn-danger">
                                            Detroy</a>
                                        @endif

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
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection