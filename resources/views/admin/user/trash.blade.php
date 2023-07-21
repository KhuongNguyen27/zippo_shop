@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product Table</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('user.index') }}" class='btn btn-primary'>Back</a>
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
                                            <a href="{{ route('customer.restore', $customer->id) }}"
                                                onclick="return confirm('Do u want to restore record?');"
                                                class="btn btn-primary">Restore
                                            </a>
                                            <a href="{{ route('customer.deleteforever', $customer->id) }}"
                                                onclick="return confirm('Do u want to delete forever record?');"
                                                class="btn btn-danger">
                                                Detroy</a>
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