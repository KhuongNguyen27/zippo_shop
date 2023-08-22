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
                    @if (Auth::user()->hasPermission('Product_create'))
                    <a href="{{ route('product.create') }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th class="serial">#</th>
                                <th class="col-2">Avatar</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
                                <th>Selled</th>
                                @if (Auth::user()->hasPermission('Product_update') )
                                <th class='text-center'>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="table-warning">
                                <td class="serial">{{ $product->id }}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <a href="#"><img class=" img-thumbnail" src="{{ asset($product->image) }}"
                                                alt=""></a>
                                    </div>
                                </td>
                                <td><span class="name">{{ $product->name }}</span> </td>
                                <td>{{ $product->category->name }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td>{{ $product->discount.'%' }}</td>
                                <td>
                                    {{ number_format($product->price)}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if($product->status == 0)
                                        <span class="btn btn-warning">Non activity</span>
                                        @elseif($product->status == 1)
                                        <span class="btn btn-secondary">Activity</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">{{ $product->selled }}</td>
                                <td>
                                    @if (Auth::user()->hasPermission('Product_update') && Auth::user()->hasPermission('Product_delete'))
                                    <div class="d-flex">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class='btn btn-info'>Edit</a>
                                        @if (Auth::user()->hasPermission('Product_delete'))
                                        <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div> <!-- /.col-lg-8 -->
</div>
</div>
@endsection