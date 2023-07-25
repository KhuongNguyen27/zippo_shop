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
                        <a href="{{ route('order.create') }}" class='badge btn-primary'>Create</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Avatar</th>
                                    <th>Customer</th>
                                    <th>Created at</th>
                                    <th>Total</th>
                                    <th>Status</th>
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
                                <tr >
                                    <td class="serial">{{ $order->id }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="{{ asset( $order->customer->image) }}"
                                                    alt=""></a>
                                        </div>
                                    </td>
                                    <td><span class="name">{{ $order->customer->name }}</span> </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ number_format($total) .' VND'}}</td>
                                    <td>
                                        <span class="badge badge-complete">Complete</span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('order.edit', $order->id) }}"
                                                class='badge btn-primary'>Edit</a>
                                            <form action="{{ route('order.destroy',$order->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="badge btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            <a href="{{ route('order.show', $order->id) }}"
                                                class='badge btn-primary'>Detail</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection