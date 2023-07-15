@extends('Admin.master')
@section('content')
<a href="{{ route('category.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($softs as $soft)
    <tr>
        <td>{{ $soft->id }}</td>
        <td class="w-25"><img class="img-thumbnail" src="{{ asset($soft->image) }}" alt=""></td>
        <td>{{ $soft->name }}</td>
        <td>{{ $soft->description }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('category.restore', $soft->id) }}"
                    onclick="return confirm('Do u want to restore record?');" class="btn btn-primary">Restore
                </a>
                <a href="{{ route('category.deleteforever', $soft->id) }}"
                    onclick="return confirm('Do u want to delete forever record?');" class="btn btn-danger">
                    Detroy</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $softs->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection