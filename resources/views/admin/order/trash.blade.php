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
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Created at</th>
                                    <th>Date ship</th>
                                    <th>Total</th>
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
                                            <div class="d-flex">
                                                <a href="{{ route('order.restore', $order->id) }}"
                                                    onclick="return confirm('Do u want to restore record?');"
                                                    class="btn btn-primary">Restore
                                                </a>
                                                <a href="{{ route('order.deleteforever', $order->id) }}"
                                                    onclick="return confirm('Do u want to delete forever record?');"
                                                    class="btn btn-danger">
                                                    Detroy</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('order.index') }}" class='btn btn-primary'>Back</a>
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