@extends('admin.master')
@section('content')
<form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="title" value="{{ $product->title }}" placeholder="Title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="teaser" value="{{ $product->teaser }}" placeholder="Teaser">
            @error('teaser')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control form-control-user" id="" cols="30" rows="10"
                value="{{ $product->content }}" placeholder="Content"></textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="price" value="{{ $product->price }}" placeholder="Price">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <select class="form-control form-control-user" name="category_id" id="">
                <option>Select category...</option>
                @foreach($products as $cate)
                <option value="{{ $cate->category->id }}">{{ $cate->category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <select class="form-control form-control-user" name="author_id" id="">
                <option>Select author...</option>
                @foreach($products as $cate)
                <option value="{{ $cate->author->id }}">{{ $cate->author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Image</label>
            <label for="file-upload" class="file-upload-label">
                <input type="file" id="file-upload" name="img_patch" accept="*" title=" ">
            </label>
        </div>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
@endsection