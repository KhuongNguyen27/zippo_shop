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
            <b>Customer : </b>{{ $order->customer->name }}</br>
            <b>Note : </b>{{ $order->note }}</br>
            <b>Created at : </b>{{ $order->created_at }}</br>
            <b>Date ship : </b>{{ $order->date_ship }}</br>
            <b>Total : </b>
        </td>
        <td>
            <div class="d-flex">
                <a href="{{ route('order.edit', $order->id) }}" class='btn btn-primary'>Edit</a>
                <form action="{{ route('order.destroy',$order->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection