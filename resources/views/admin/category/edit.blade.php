@extends('Admin.master')
@section('content')
<form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name of category</label>
        <input type="text" class="form-control w-50 mb-3" name='name' value="{{ $category->name }}">
        @error('name')
        <div class="alert alert-danger w-50 mb-3 ">{{ $message }}</div>
        @enderror

        <label class="form-label">Description</label>
        <textarea name='description' id='description'>{{ $category->description }}</textarea>
        @error('description')
        <div class="alert alert-danger w-50 mb-3 ">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label class="form-label">Image</label>
            <input type="file" class="form-control-file" id="inputFile" name="image">
            @error('image')
            <div class="alert alert-danger w-50 mb-3 ">{{ $message }}</div>
            @enderror
        </div>
        <img src="{{ asset($category->image) }}" width="150px" height="150px" alt="">

        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection