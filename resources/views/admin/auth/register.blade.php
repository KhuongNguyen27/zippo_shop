@include('Admin.Include.header')

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('staff.checkRegister') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="form-label">Staff Name</label>
                                            <input type="text" class="form-control form-control-user" name="name"
                                                placeholder="Staff Name">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Day of birth</label>
                                            <input type="date" class="form-control form-control-user"
                                                name="day_of_birth" placeholder="Day of birth">
                                            @error('day_of_birth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control form-control-user" name="email"
                                            placeholder="Email Address">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control form-control-user" name="phonenumber"
                                            placeholder="Phone Number">
                                        @error('phonenumber')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control form-control-user" name="address"
                                            placeholder="Address">
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Position</label>
                                        <input type="text" class="form-control form-control-user" name="position"
                                            placeholder="Position">
                                        @error('position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Branch</label>
                                        <input type="text" class="form-control form-control-user" name="branch"
                                            placeholder="Branch">
                                        @error('branch')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password">
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Repeat Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="repeatpassword" placeholder="Repeat Password">
                                            @error('repeatpassword')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if (Session::has('repeatpassword-fail'))
                                    <div class="repeatpassword-fail">
                                        <p class="alert alert-danger">{{ Session::get('repeatpassword-fail') }}</p>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <label for="file-upload" class="file-upload-label">
                                            <input type="file" id="file-upload" name="img_patch" accept="*" title=" ">
                                        </label>
                                    </div>
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                </div>
                                <button type="submit" class="btn btn-primary w-25">Submit</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('staff.login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Include.footer')
</body>

</html>