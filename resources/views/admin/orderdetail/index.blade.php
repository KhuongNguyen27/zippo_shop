@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Order Table</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('order.index') }}" class='btn btn-primary'>Back</a>
                        <a href="{{ route('orderdetail.create',$id) }}" class='btn btn-primary'>Create</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $detail)
                                <tr>
                                    <td>{{ ($detail->order->id) }}</td>
                                    <td>{{ ($detail->order->customer->name) }}</td>
                                    <td>{{ ($detail->product->name) }}</td>
                                    <td>{{ number_format($detail->product->price) .' VND' }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ number_format($detail->total) .' VND'}}</td>
                                    <td>{{ $detail->created_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('orderdetail.edit', $detail->id) }}"
                                                class='btn btn-primary'>Edit</a>
                                            <form action="{{ route('orderdetail.destroy',$detail->id) }}" method="post">
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
                            {{ $orderdetails->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection