@include('admin.include.header')

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('admin/images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" action="{{ route('auth.checklogin') }}">
                        {{ csrf_field() }}
                        @if (Session::has('login-fail'))
                        <div class="login-fail">
                            <p class="alert alert-danger">{{ Session::get('login-fail') }}</p>
                        </div>
                        @endif
                        @if (Session::has('register-true'))
                        <div class="register-true">
                            <p class="alert alert-primary">{{ Session::get('register-true') }}</p>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name='email' value="{{ old('email') }}"
                                placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name='password' placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i
                                        class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i
                                        class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.include.footer')

</body>

</html>