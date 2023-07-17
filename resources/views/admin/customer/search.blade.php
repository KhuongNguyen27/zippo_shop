@extends('Admin.master')
@section('content')
<a href="{{ route('staff.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Day of Birth</th>
        <th scope="col">Position</th>
        <th scope="col">Branch</th>
        <th scope="col">Day of Start</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($staffs as $staff)
    <tr>
        <td>{{ $staff->id }}</td>
        <td class="w-25"><img class="img-thumbnail" src="{{ asset($staff->img_patch) }}" alt=""></td>
        <td>{{ $staff->name }}</td>
        <td>{{ $staff->day_of_birth }}</td>
        <td>{{ $staff->position }}</td>
        <td>{{ $staff->branch }}</td>
        <td>{{ $staff->day_of_start }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('staff.edit', $staff->id) }}" class='btn btn-primary'>Edit</a>
                <form action="{{ route('staff.destroy',$staff->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('staff.show', $staff->id) }}" class='btn btn-primary'>Show</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $staffs->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection