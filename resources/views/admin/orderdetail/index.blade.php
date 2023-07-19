@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<a href="{{ route('order.index') }}" class='btn btn-primary'>Back</a>
<a href="{{ route('orderdetail.create',$id) }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Customer</th>
        <th scope="col">Order</th>
    </tr>
    @foreach ($orderdetails as $detail)
    <tr>
        <td>
            {{ ($detail->order->id) }}</br>
        </td>
        <td>
            {{ ($detail->order->customer->name) }}</br>
        </td>
        <td>
            <b>Product : </b>{{ ($detail->product->name) }}</br>
            <b>Price : </b>{{ ($detail->product->price) }}</br>
            <b>Quantity : </b>{{ $detail->quantity }}</br>
            <b>Total: </b> {{ number_format($detail->total) .' VND'}}</br>
            <b>Created at : </b>{{ $detail->created_at }}
        </td>
        <td>
            <div class="d-flex">
                <a href="{{ route('orderdetail.edit', $detail->id) }}" class='btn btn-primary'>Edit</a>
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
</table>
<div class="pagination">
    {{ $orderdetails->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection