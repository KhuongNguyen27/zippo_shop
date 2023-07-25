@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Orders </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <a href="{{ route('order.index') }}" class='badge btn-primary'>Back</a>
                        <a href="{{ route('orderdetail.create',$id) }}" class='badge btn-primary'>Create</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Created at</th>
                                    <th class='text-center'>Action</th>
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
                                                class='badge btn-primary'>Edit</a>
                                            <form action="{{ route('orderdetail.destroy',$detail->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="badge btn-danger"
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
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection