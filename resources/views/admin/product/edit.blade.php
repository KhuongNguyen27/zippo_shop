@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Product Update Form</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-5">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control form-control-user" value="{{ $product->name }}"
                                name="name" placeholder="Tu tien">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-md-7">
                        <label class="form-label">Category</label>
                        <select class="form-control form-control-user" name="category_id">
                            <option value="{{ $product->category_id }}">{{ $product->category_id }}
                                : {{ $product->category->name }} </option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->id }} :
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control form-control-user" value="{{ $product->quantity }}"
                        name="quantity" placeholder="10">
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Discount</label>
                    <input type="text" class="form-control form-control-user" value="{{ $product->discount }}"
                        name="discount" placeholder="20%">
                    @error('discount')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control form-control-user" value="{{ $product->price }}" name="price"
                        placeholder="XXX.XXX VND">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label class="form-label">Status</label>
                    <select class="form-control form-control-user" name="status">
                        <option>Select status...</option>
                        <option value="0">Non activity</option>
                        <option value="1">Activity</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="description">{{ $product->description }}</textarea>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Image</label>
                    <label for="file-upload" class="file-upload-label">
                        <input type="file" id="file-upload" value="{{ $product->image }}" name="image" accept="*"
                            title=" ">
                    </label>
                    </br>
                    <img class='img-thumbnail w-25' src="{{ asset($product->image) }}" alt="">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('product.index') }}" class='btn btn-secondary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection