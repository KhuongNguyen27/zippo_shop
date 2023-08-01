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
                    @if (Auth::user()->hasPermission('Order_create') )
                    <a href="{{ route('order.index') }}" class='btn btn-secondary'>Back</a>
                    <a href="{{ route('orderdetail.create',$order->id) }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="6" class='text-left'><b class='fw-normal' style="color:black">Mã hóa đơn :
                                        {{$order->id}}</br>Ghi chú: {{$order->note}}</b></th>
                            </tr>
                            <tr class="table-primary">
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Giảm giá</th>
                                <th>Tổng tiền</th>
                                @if($order->status == 0)
                                <th>Hành động</th>
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
                                            onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');"
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