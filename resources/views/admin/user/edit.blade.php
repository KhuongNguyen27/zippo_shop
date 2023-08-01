@extends('admin.master')
@section('content')
<form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>User create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control form-control-user" value=" {{ $user->name }}" readonly>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Day of birth</label>
                        <input type="text" class="form-control form-control-user" value=" {{ $user->day_of_birth }} "
                            readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control form-control-user" value="{{ $user->address }}" readonly>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control form-control-user" name="email"
                        placeholder="nguyenhuukhuong27102000@gmail.com">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control form-control-user">
                        <option>Select gender</option>
                        <option value="0">Another</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control form-control-user" value="{{ $user->phone }}" readonly>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-control-user" name="password"
                            placeholder="******">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Repeat password</label>
                        <input type="password" class="form-control form-control-user" name="repeatpassword"
                            placeholder="******">
                        @error('repeatpassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" accept="*" title=" ">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('product.index') }}" class='btn btn-info'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection