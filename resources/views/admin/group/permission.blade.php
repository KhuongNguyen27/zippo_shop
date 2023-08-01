@extends('admin.master')
@include('sweetalert::alert')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <h1 class="text-center"><strong>Permission</strong></h1>
        <div class="buttons">
            <div class="ml-5">
                <div class="mb-3">
                    <label class="form-label"><b>Premissions </b> : <a href="javascript:;" id="checkAll" style="color:blue;">Checkall</a>
                    </label>
                </div>
            </div>
            <form action="{{ route('group.grantpermission') }}" method="post">
                <input type="hidden" name="id" value="{{ $id }}">
                @csrf
                <div class="row">
                    @php
                    $groupNames = $roles->keys();
                    @endphp
                    @foreach($roles as $role)
                    <div class="col-md-6">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-12"
                                style='background-color: #ffeeba; padding: 20px; border: 2px solid #d6d6d6; border-top-color: #f9f9f9; border-left-color: #f9f9f9; border-bottom-color: #b3b3b3; border-right-color: #b3b3b3;'>
                                <div class="card">
                                    @foreach($role as $group)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <label class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="name[]"
                                                value="{{$group->id}}">
                                            <span>{{ $group->name }}</span>
                                            <span class="switcher-indicator"></span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('group.index') }}" class="btn btn-info">Back</a>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function() {
    jQuery('#checkAll').click(function() {
        if (jQuery(this).hasClass('checked')) {
            $('.form-check-input').prop('checked', false);
            $(this).removeClass('checked');
            $(this).html('CheckAll');
        } else {
            $('.form-check-input').prop('checked', true);
            $(this).addClass('checked');
            $(this).html('UnCheckAll');
        }
    });
});
</script>
@endsection