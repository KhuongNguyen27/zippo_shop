@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Category Table</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <a href="{{ route('category.create') }}" class='badge btn-primary'>Create</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="serial">{{ $category->id }}</td>
                                    <td><span class="name">{{ $category->name }}</span> </td>
                                    <td><img src="{{asset($category->image)}}" alt=""></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class='badge btn-primary'>Edit</a>
                                            <form action="{{ route('category.destroy',$category->id) }}" method="post">
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
                            {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection