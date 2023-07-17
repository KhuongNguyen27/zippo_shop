@extends('admin.master')
@section('content')
<form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control form-control-user" name="name" placeholder="Nguyen Huu Khuong">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label class="form-label">Password</label>
                <input type="date" class="form-control form-control-user" name="day_of_birth"
                    placeholder="day_of_birth">
                @error('day_of_birth')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="address"
                placeholder="Trieu Thuong - Trieu Phong - Quang Tri">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="email"
                placeholder="nguyenhuukhuong27102000@gmail.com">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
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
            <input type="text" class="form-control form-control-user" name="phone" placeholder="0947964***">
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" name="password" placeholder="******">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" name="repeatpassword"
                    placeholder="******">
                @error('repeatpassword')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Image</label>
            <label for="file-upload" class="file-upload-label">
                <input type="file" id="file-upload" name="image" accept="*" title=" ">
            </label>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <button type="submit" class="btn btn-primary w-25">Submit</button>
</form>
@endsection