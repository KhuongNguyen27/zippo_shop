<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@php
    $order = $data['notes'];
    $details = $order->orderdetail;
@endphp
<h1 class="text-center">Order Table</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Subtotal</th>
            <th>Created at</th>

        </tr>
    </thead>
    <tbody>
        @foreach($details as $detail)
        <tr>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ $detail->product->price }}</td>
            <td>{{ $detail->product->discount }}</td>
            <td>{{ number_format($detail->total).' VND' }}</td>
            <td>{{ date('d-m-Y', strtotime($detail->created_at)) }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="6" class="text-left">
                Customer : {{ $order->customer->name }}<br>
                Note: {{ $order->note }}<br>
                Total: {{  number_format($order->total).' VND' }}
            </th>
        </tr>
    </tbody>
</table>
