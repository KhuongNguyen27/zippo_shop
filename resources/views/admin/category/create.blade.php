@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Category Create Form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Name of category</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Image</label>
                    <input type="file" class='btn form-control' name="image" value="{{ old('image') }}">
                    @error('image')
                    <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('category.index') }}" class='btn btn-secondary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection