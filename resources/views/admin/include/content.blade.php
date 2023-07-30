@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('category.create') }}" class='badge btn-primary'>Create</a>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
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
                                    <td><img src="{{ asset($category->image) }}"></td>
                                    <td>
                                        <div class="d-flex">
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
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection