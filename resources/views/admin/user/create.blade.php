@extends('admin.master')
@section('content')
<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>User create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control form-control-user" value="{{ old('name') }}" name="name"
                            placeholder="Nguyen Huu Khuong">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Day of birth</label>
                        <input type="date" class="form-control form-control-user" value="{{ old('day_of_birth') }}" name="day_of_birth"
                            placeholder="day_of_birth">
                        @error('day_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control form-control-user" value="{{ old('address') }}" name="address"
                        placeholder="Trieu Thuong - Trieu Phong - Quang Tri">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control form-control-user" value="{{ old('email') }}" name="email"
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
                    <input type="text" class="form-control form-control-user" value="{{ old('phone') }}" name="phone" placeholder="0947964***">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Position</label>
                    <select name="group_id"  class="form-control form-control-user">
                        <option>Select position</option>
                        @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-control-user" value="{{ old('password') }}" name="password"
                            placeholder="******">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Repeat password</label>
                        <input type="password" class="form-control form-control-user" value="{{ old('repeatpassword') }}" name="repeatpassword"
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
                <a href="{{ route('product.index') }}" class='btn btn-secondary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection