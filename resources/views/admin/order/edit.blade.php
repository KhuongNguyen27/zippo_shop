@extends('admin.master')
@section('content')
<form action="{{ route('order.update',$order->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <div class="form-group">
            <label class="form-label">Customer</label>
            <select class="form-control form-control-user" name="customer_id" id="">
                <option>Select customer...</option>
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
            <input type="date" class="form-control form-control-user" value="{{ $order->date_ship }}" name="date_ship" placeholder="More than now">
            @error('date_ship')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Note</label>
            <textarea class="form-control form-control-user" id="description" name="note">{{ $order->note }}</textarea>
            @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
@endsection