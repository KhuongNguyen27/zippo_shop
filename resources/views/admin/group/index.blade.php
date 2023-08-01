@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="content">
    <div class="animated fadeIn">
        <div class="buttons">
            <div style="background-color: #ffeeba;">
                <!-- Left Block -->
                {{-- @if (Auth::user()->hasPermission('Group_permission') ) --}}
                <a href="{{ route('group.create') }}" class='btn btn-primary'>Create</a>
                {{-- @endif --}}
                <div class="row">
                    @foreach($groups as $group)
                    <div class="col-md-6">
                        <div class="card" onclick="window.location.href='{{ route('group.show',$group->id) }}';">
                            <div class="card-header">
                                <strong>{{ $group->name }}</strong>
                            </div>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($group->user as $name)
                            @php
                            $total += 1;
                            @endphp
                            @endforeach
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <a style="color:black;">Group have {{ $total }} person</a>
                                {{-- @if (Auth::user()->hasPermission('Group_permission') ) --}}
                                <a href="{{ route('group.permission',$group->id) }}" class="btn btn-info text-end">has
                                    Permission</a>
                                {{--@endif --}}
                            </div>
                        </div><!-- /# card -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection