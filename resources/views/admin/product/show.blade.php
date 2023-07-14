@extends('Admin.master')
@section('content')
@include('sweetalert::alert')
<a href="{{ route('product.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Teaser</th>
        <th scope="col">Content</th>
        <th scope="col">Category</th>
        <th scope="col">Author</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
    </tr>
    <tr>
        <?php 
        ?>
        <td>{{ $product->id }}</td>
        <td class="w-25"><img class="img-thumbnail" src="{{ asset($product->img_patch) }}" alt=""></td>
        <td>{{ $product->title }}</td>
        <td>{{ $product->teaser }}</td>
        <td>{{ $product->content }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->author->name }}</td>
        <td>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' $' }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('product.edit', $product->id) }}" class='btn btn-primary'>Edit</a>
                <form action="{{ route('product.destroy',$product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </td>
    </tr>
</table>
@endsection