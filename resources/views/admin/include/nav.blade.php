<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('order.index')}}"><img src="{{ asset('admin/images/logo.png') }}"
                    alt="Logo"></a>
            <!-- <a class="navbar-brand hidden" href="./"><img src="{{ asset('admin/images/logo2.png') }}" alt="Logo"></a> -->
            <a href="javascript:;" id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form action="{{ route('auth.search') }}" method='get' class="search-form">
                        @csrf
                        @php 
                            $url = url()->current();
                        @endphp
                        <input type="hidden" name="url" value="{{ $url }}">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." name="search"
                            aria-label="Search" required>
                        <button class="search" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ asset('admin/images/admin.jpg') }}"
                        alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i>{{ Auth::user()->name }}</a>
                    <a class="nav-link" href="{{ route('auth.logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
$(document).ready(function() {
    $('#menuToggle').click(function() {
        if ($('body').hasClass('open')) {
            $('body').removeClass('open');
        } else {
            $('body').addClass('open');
        }
    })
})
</script>