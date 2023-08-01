@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Customer Table </h4>
                </div>
                <div class="card-body--">
                    @if (Auth::user()->hasPermission('Customer_create'))
                    <a href="{{ route('customer.create') }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th class="serial">#</th>
                                <th class="col-2 avatar">Avatar</th>
                                <th class="col-2">Name</th>
                                <th>Day of birth</th>
                                <th>Gender</th>
                                <th>Created at</th>
                                @if (Auth::user()->hasPermission('Customer_update'))
                                <th class='text-center'>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr class="table-warning">
                                <td class="serial">{{ $customer->id }}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <a href="#"><img class="img-thumbnail rounded-circle"
                                                src="{{ asset($customer->image) }}" alt=""></a>
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
                                    {{ $customer->created_at }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if (Auth::user()->hasPermission('Customer_update'))
                                        <a href="{{ route('customer.edit', $customer->id) }}"
                                            class='btn btn-info'>Edit</a>
                                        @if (Auth::user()->hasPermission('Customer_delete'))
                                        <form action="{{ route('customer.destroy',$customer->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $customers->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection