@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Category Table</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($softs as $soft)
                                <tr>
                                    <td>{{ $soft->id }}</td>
                                    <td>{{ $soft->name }}</td>
                                    <td>{{ $soft->description }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('category.restore', $soft->id) }}"
                                                onclick="return confirm('Do u want to restore record?');"
                                                class="btn btn-primary">Restore
                                            </a>
                                            <a href="{{ route('category.deleteforever', $soft->id) }}"
                                                onclick="return confirm('Do u want to delete forever record?');"
                                                class="btn btn-danger">
                                                Detroy</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('category.index') }}" class='btn btn-primary'>Back</a>
                        <div class="pagination">
                            {{ $softs->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection