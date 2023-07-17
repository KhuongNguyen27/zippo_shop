@extends('Admin.master')
@section('content')
@include('sweetalert::alert')
<a href="{{ route('order.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Order</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>
            <b>ID : </b>{{ $order->id }}</br>
        </td>
        <td>
            <b>Customer : </b>{{$order->customer->name }}</br>
            <b>Note : </b>{{ $order->note }}</br>
            <b>Created at : </b>{{ $order->created_at }}</br>
            <b>Date ship : </b>{{ $order->date_ship }}</br>
            <b>Total : </b>
        </td>
        <td>
        <div class="d-flex">
                <a href="{{ route('order.restore', $order->id) }}"
                    onclick="return confirm('Do u want to restore record?');" class="btn btn-primary">Restore
                </a>
                <a href="{{ route('order.deleteforever', $order->id) }}"
                    onclick="return confirm('Do u want to delete forever record?');" class="btn btn-danger">
                    Detroy</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection