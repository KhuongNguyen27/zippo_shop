@extends('admin.master')
@section('content')
<form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control form-control-user" value='{{ $product->name }}' name="name"
                placeholder="Tu tien">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Category</label>
            <select class="form-control form-control-user" value='{{ $product->category_id }}' name="category_id" id="">
                <option>Select category...</option>
                @foreach($products as $product)
                <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Price</label>
            <input type="text" class="form-control form-control-user" value='{{ $product->price }}' name="price"
                placeholder="XXX.XXX VND">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control form-control-user" value='{{ $product->quantity }}' name="quantity"
                placeholder="10">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Discount</label>
            <input type="text" class="form-control form-control-user" value='{{ $product->discount }}' name="discount"
                placeholder="20%">
            @error('discount')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"
                style="resize: none">{{ $product->description }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Image</label>
            <label for="file-upload" class="file-upload-label">
                <input type="file" id="file-upload" value='{{ $product->image }}' name="image" accept="*" title=" ">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </label>
        </div>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
@endsection