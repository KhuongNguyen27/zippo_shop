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
                        <a href="{{ route('customer.create') }}" class='btn btn-primary'>Create</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Day of birth</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td class="w-25"><img class="img-thumbnail rounded-circle"
                                            src="{{ asset($customer->image) }}" alt=""></td>
                                    <td>{{ $customer->name }}</td>
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
                                                class='btn btn-primary'>Edit</a>
                                            <form action="{{ route('customer.destroy',$customer->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            <!-- <a href="{{ route('customer.show', $customer->id) }}"
                                                class='btn btn-primary'>show</a> -->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $customers->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection