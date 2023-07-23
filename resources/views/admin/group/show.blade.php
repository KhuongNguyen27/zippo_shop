@extends('admin.master')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Group Table</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('group.create') }}" class='btn btn-primary'>Create</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Position</th>
                                    <th>Branch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @switch($user->gender)
                                        @case('0')
                                        Another</br>
                                        @break
                                        @case('1')
                                        Male</br>
                                        @break
                                        @case('2')
                                        Female</br>
                                        @break
                                        @default
                                        The status is unknown.</br>
                                        @break
                                        @endswitch
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->group->name }}</td>
                                    <td>{{ $user->branch }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class='btn btn-primary'>Edit</a>
                                            <!-- <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form> -->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection