@extends('admin.master')
@section('content')
<form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Category create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Name of category</label>
                    <input type="text" class="is-valid form-control-success form-control" name="name"
                        value="{{ $category->name }}">
                    @error('name')
                    <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Description</label>
                    <input type="file" class='form-control' name="image">
                    @error('image')
                    <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('category.index') }}" class='btn btn-primary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection