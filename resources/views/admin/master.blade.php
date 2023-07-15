@include('admin.include.header')
<body id="page-top">
    <div id="wrapper">
        @include( 'admin.include.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.include.nav')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>

    