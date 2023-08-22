@include('admin.include.header')
<body class='open'>
    <div id="right-panel" class="right-panel">
        <div class="mb-2 mr-3">
            <div class="sufee-login d-flex align-content-center flex-wrap">
                <div class="container">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="{{route('auth.login')}}">
                                <img class="align-content" src="{{ asset('admin/images/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('user.postforgot') }}" method="post">
                                <div class="form-group">
                                    @csrf
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        @include('admin.include.footer')
    </div>
</body>

</html>