@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Product Table </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <a href="{{ route('user.create') }}" class='btn btn-primary'>Create</a>
                        <table class="table">
                            <thead>
                                <tr>
                                      <th class="serial">#</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Position</th>
                                    <th>Branch</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="serial">{{ $user->id }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="{{ asset($user->image) }}"
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
                                    <td>{{ $user->branch }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class='btn btn-primary'>Edit</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection