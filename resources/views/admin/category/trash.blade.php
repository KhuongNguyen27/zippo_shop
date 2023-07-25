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
                    <div class="table-stats order-table ov-h">
                        <a href="{{ route('category.index') }}" class='badge btn-primary'>Back</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Type</th>
                                    <th>Description at</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($softs as $soft)
                                <tr>
                                    <td class="serial">{{ $soft->id }}</td>
                                    <td><span class="name">{{ $soft->name }}</span> </td>
                                    <td>{{ $soft->description }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('category.restore', $soft->id) }}"
                                                onclick="return confirm('Do u want to restore record?');"
                                                class='badge btn-primary'>Restore</a>
                                            <a href="{{ route('category.deleteforever', $soft->id) }}"
                                                onclick="return confirm('Do u want to delete forever record?');"
                                                class="badge btn-danger">Detroy</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $softs->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection