@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Category Trash Table</h4>
                </div>
                <div class="card-body--">
                    <a href="{{ route('category.index') }}" class='btn btn-secondary'>Back</a>
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th class="serial">#</th>
                                <th class="col-3">Type</th>
                                <th class="col-2 justify-content-left" >Image</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr class="table-warning">
                                <td class="serial">{{ $category->id }}</td>
                                <td><span class="name">{{ $category->name }}</span> </td>
                                <td><img class="img-thumbnail" src="{{asset($category->image)}}" alt=""></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('category.restore', $category->id) }}"
                                            onclick="return confirm('Do u want to restore record?');"
                                            class='btn btn-info'>Restore</a>
                                        @if (Auth::user()->hasPermission('Category_forceDelete'))
                                        <a href="{{ route('category.deleteforever', $category->id) }}"
                                            onclick="return confirm('Do u want to delete forever record?');"
                                            class="btn btn-danger">Detroy</a>
                                        @endif
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
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection