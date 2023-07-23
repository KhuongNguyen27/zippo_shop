@extends('admin.master')
@section('content')
<form action="{{ route('group.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>User create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class="form-label">New Group</label>
                    <input type="text" class="form-control form-control-user" value="{{ old('name') }}" name="name"
                        placeholder="Manager">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('group.index') }}" class='btn btn-primary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection