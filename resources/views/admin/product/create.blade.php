@extends('Admin.master')
@section('content')
<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control form-control-user" name="name" placeholder="Tu tien">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-6">
                <label class="form-label">Category</label>
                <select class="form-control form-control-user" name="category_id" id="">
                    <option>Select category...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->id }} : {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control form-control-user" name="quantity" placeholder="10">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Discount</label>
            <input type="text" class="form-control form-control-user" name="discount" placeholder="20%">
            @error('discount')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Price</label>
            <input type="text" class="form-control form-control-user" name="price" placeholder="XXX.XXX VND">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" style="resize: none"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Image</label>
            <label for="file-upload" class="file-upload-label">
                <input type="file" id="file-upload" name="image" accept="*" title=" ">
            </label>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
@endsection