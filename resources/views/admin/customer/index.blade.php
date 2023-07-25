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
                        <a href="{{ route('customer.create') }}" class='btn btn-primary'>Create</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Avatar</th>
                                    <th>Name</th>
                                    <th>Day of birth</th>
                                    <th>Gender</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td class="serial">{{ $customer->id }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="{{ asset($customer->image) }}"
                                                    alt=""></a>
                                        </div>
                                    </td>
                                    <td><span class="name">{{ $customer->name }}</span> </td>
                                    <td>{{ $customer->day_of_birth }}</td>
                                    <td>
                                        @switch($customer->gender)
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
                                    <td>
                                    <div class="d-flex">
                                        <a href="{{ route('customer.edit', $customer->id) }}"
                                            class='badge btn-primary'>Edit</a>
                                        <form action="{{ route('customer.destroy',$customer->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="badge btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $customers->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection