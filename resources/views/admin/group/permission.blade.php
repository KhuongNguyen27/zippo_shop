@extends('admin.master')
@include('sweetalert::alert')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="buttons">
            <h1 class="text-center" style="color:blue"><strong>Permission</strong></h1>
            <input type="checkbox" id="checkAll" class="form-check-input" value="Quyền hạn">
            <label class="w3-button w3-blue" style="color:blue">{{ __('Grant all permissions') }}</label>
            <br>
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
                            <div class="col-md-12">
                                <div class="card">
                                    @foreach($role as $group)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <label class="form-check form-switch">
                                            <input class="checkItem form-check-input checkItem" type="checkbox"
                                                name="name[]" value="{{$group->id}}" id="">
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
                <a href="{{ route('group.index') }}" class="btn btn-primary">Back</a>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
$('#checkAll').click(function() {
    $(':checkbox.checkItem').prop('checked', this.checked);
});
</script>
@endsection