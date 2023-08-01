@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Users Table </h4>
                </div>
                <div class="card-body--">
                    @if (Auth::user()->hasPermission('User_create') )
                    <a href="{{ route('user.create') }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th class="serial">#</th>
                                <th class="col-2">Avatar</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="table-warning">
                                <td class="serial">{{ $user->id }}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <a href="#"><img class="img-thumbnail rounded-circle" src="{{ asset($user->image) }}"
                                                alt=""></a>
                                    </div>
                                </td>
                                <td><span class="name">{{ $user->name }}</span> </td>
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
                                <td>
                                    @if (Auth::user()->hasPermission('User_update') )
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('user.edit', $user->id) }}" class='btn btn-info'>Edit</a>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection