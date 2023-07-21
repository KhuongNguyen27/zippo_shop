@extends('admin.master')
@section('content')
<form action="{{ route('order.update',$order->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Order create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-label">Customer</label>
                    <select class="form-control form-control-user" name="customer_id" id="">
                        <option value="{{ $order->customer_id }}" >{{ $order->customer_id }} : {{ $order->customer->name }}</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->id }} : {{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Date ship</label>
                    <input type="date" class="form-control form-control-user" value="{{ $order->date_ship }}"
                        name="date_ship" placeholder="More than now">
                    @error('date_ship')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Note</label>
                    <textarea class="form-control form-control-user" id="description"
                        name="description">{{ $order->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('order.index') }}" class='btn btn-primary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection