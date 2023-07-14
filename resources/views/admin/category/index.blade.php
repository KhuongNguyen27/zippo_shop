@extends('Admin.master')
@section('content')
@include('sweetalert::alert')
<a href="{{ route('category.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td class = "w-25"><img class="img-thumbnail" src="{{ asset($category->image) }}" alt=""></td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <div class="d-flex">    
                <a href="{{ route('category.edit', $category->id) }}" class='btn btn-primary'>Edit</a>
                <form action="{{ route('category.destroy',$category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection