@extends('Admin.master')
@section('content')
<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">

        <div class="form-group">
            <label class="form-label">Name of category</label>
            <input type="text" class="form-control w-50 mb-3" name='name' >
            @error('name')
            <div class="alert alert-danger w-50 mb-3 ">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name='description' id='description'></textarea>
            @error('description')
            <div class="alert alert-danger w-50 mb-3 ">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="file" class="form-control-file" id="inputFile" name="image">
            @error('image')
            <div class="alert alert-danger w-50 mb-3 ">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection