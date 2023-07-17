@extends('Admin.master')
@section('content')
@include('sweetalert::alert')
<a href="{{ route('customer.create') }}" class='btn btn-primary'>Create</a>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Information</th>
        <th scope="col">Action</th>
    </tr>
    @foreach ($customers as $customer)
    <tr>
        <?php 
        ?>
        <td>{{ $customer->id }}</td>
        <td class="w-25"><img class="w-100 rounded-circle" src="{{ asset($customer->image) }}" alt=""></td>
        <td>
            <b>Name : </b>{{ $customer->name }}</br>
            <b>Day of birth : </b>{{ $customer->day_of_birth }}</br>
            <b>Address : </b>{{ $customer->address }}</br>
            <b>Email : </b>{{ $customer->email }}</br>
            <b>Gender :</b>
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
            <b>Phone : </b>{{ $customer->phone }}</br>
            <b>Password : </b>{{ $customer->password }}
        </td>
        <td>
            <div class="d-flex">
                <a href="{{ route('customer.edit', $customer->id) }}" class='btn btn-primary'>Edit</a>
                <form action="{{ route('customer.destroy',$customer->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $customers->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection