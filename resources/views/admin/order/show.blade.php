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
                    <a href="{{ route('order.index') }}" class='btn btn-secondary'>Back</a>
                    @if (Auth::user()->hasPermission('Order_create') )
                    <a href="{{ route('orderdetail.create',$order->id) }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="6" class='text-left'><b class='fw-normal' style="color:black">Order ID :
                                        {{$order->id}}</br>Note : {{$order->note}}</b></th>
                            </tr>
                            <tr class="table-primary">
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Subtotal</th>
                                @if($order->status == 0)
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $detail)
                            <tr class="table-warning">
                                <td>{{$detail->product->name}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{ number_format($detail->product->price) .' VND' }}</td>
                                <td>{{number_format($detail->product->discount) .' %'}}</td>
                                <td>{{ number_format($detail->total) .' VND' }}</td>
                                @if($order->status == 0)
                                <td>
                                    @if (Auth::user()->hasPermission('Orderdetail_update'))
                                    <form action="{{ route('orderdetail.destroy', $detail->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('orderdetail.edit', $detail->id) }}"
                                            class="btn btn-info">Edit</a>
                                        @endif

                                        @if (Auth::user()->hasPermission('Orderdetail_delete'))
                                        <button
                                            onclick="return confirm('Are u sure?');"
                                            class="btn btn-danger">Delete</button>
                                        @endif
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $details->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection