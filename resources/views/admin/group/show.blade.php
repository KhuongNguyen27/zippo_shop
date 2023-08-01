@extends('admin.master')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Users Table </h4>
                </div>
                <div class="card-body--">
                    <a href="{{ route('group.index') }}" class='btn btn-primary'>Back</a>
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($group->user as $user)
                            <tr class="table-warning">
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
                                <td>
                                    {{--@if (Auth::user()->hasPermission('Group_permission') )--}}
                                    <div class="d-flex">
                                        <a href="{{ route('user.edit', $user->id) }}" class='btn btn-primary'>Edit</a>
                                    </div>
                                    {{--@endif--}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection