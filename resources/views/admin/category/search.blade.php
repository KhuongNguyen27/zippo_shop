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
                    @if (Auth::user()->hasPermission('Category_create'))
                    <a href="{{ route('category.create') }}" class='btn btn-primary'>Create</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr class="table-primary ">
                                <th class="serial col-2">#</th>
                                <th class="col-3">Type</th>
                                <th class="col-3 justify-content-left">Image</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr class="table-warning">
                                <td class="serial">{{ $category->id }}</td>
                                <td><span class="name">{{ $category->name }}</span> </td>
                                <td><img class="img-thumbnail" src="{{asset($category->image)}}" style='width:200px;'>
                                </td>
                                <td>
                                    @if (Auth::user()->hasPermission('Category_update'))
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class='btn btn-info'>Edit</a>
                                        @if (Auth::user()->hasPermission('Category_delete'))
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection