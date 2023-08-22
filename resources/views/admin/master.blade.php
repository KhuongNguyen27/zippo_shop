@include('admin.include.header')
<body class='open'>
    @include('admin.include.sidebar')
    <div id="right-panel" class="right-panel">
        @include('admin.include.nav')
        <div class="mb-2 mr-3">
            @yield('content')
        </div>
        <div class="clearfix"></div>
        @include('admin.include.footer')
    </div>
</body>
</html>