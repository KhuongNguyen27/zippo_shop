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
                    <a href="{{ route('order.create') }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th class="serial">#</th>
                                <th class="avatar">Avatar</th>
                                <th>Customer</th>
                                <th>Created at</th>
                                <th>Total</th>
                                <th class='text-center'>Status</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($order->orderdetail as $detail)
                            @php
                            $total += $detail->total;
                            @endphp
                            @endforeach
                            <tr class="table-warning">
                                <td class="serial">{{ $order->id }}</td>
                                <td class="avatar col-2">
                                    <div class="round-img">
                                        <a href="#"><img class="img-thumbnail" width="200"
                                                src="{{ asset( $order->customer->image) }}" alt=""></a>
                                    </div>
                                </td>
                                <td><span class="name">{{ $order->customer->name }}</span> </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ number_format($total) .' VND'}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if($order->status == 0)
                                        <span class="btn btn-warning">IN PROCESS...</span>
                                        @elseif($order->status == 1)
                                        <span class="btn btn-secondary">COMPLETE</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if($order->status == 0)
                                        @if(Auth::user()->hasPermission('Order_update'))
                                        <a href="{{ route('order.edit', $order->id) }}"
                                            class='btn btn-info'>Edit</a>
                                        @endif
                                        @if(Auth::user()->hasPermission('Order_delete'))
                                        <form action="{{ route('order.destroy',$order->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endif
                                        @endif
                                        @if(Auth::user()->hasPermission('Order_view'))
                                        <a href="{{ route('order.show', $order->id) }}"
                                            class='btn btn-info'>Detail</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection