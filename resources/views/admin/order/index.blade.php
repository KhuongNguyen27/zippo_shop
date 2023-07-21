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
                        <a href="{{ route('order.create') }}" class='btn btn-primary'>Create</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Created at</th>
                                    <th>Date ship</th>
                                    <th>Total</th>
                                    <th>Action</th>
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
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->date_ship }}</td>
                                    <td>{{ number_format($total) .' VND'}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('order.edit', $order->id) }}"
                                                class='btn btn-primary'>Edit</a>
                                            <form action="{{ route('order.destroy',$order->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            <a href="{{ route('order.show', $order->id) }}"
                                                class='btn btn-primary'>Detail</a>
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
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection