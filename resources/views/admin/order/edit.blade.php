@extends('admin.master')
@section('content')
@include('sweetalert::alert')
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
                    <input type="text" value='{{$order->customer->name}}' class="form-control" readonly>
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
                    <label class="form-label">Status</label>
                    <select class="form-control form-control-user" name="status" id="">
                        <option value="0">In process..</option>
                        <option value="1">Complete</option>
                    </select>
                    <div class="m-2"><i class="fst-italic">if u choose complete, u can't update order in the future</i></div>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Note</label>
                    <textarea class="form-control form-control-user" name="note">{{ $order->note }}</textarea>
                    @error('note')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('order.index') }}" class='btn btn-light'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection