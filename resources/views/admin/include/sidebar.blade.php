<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                
                <!-- Category -->
                @if (Auth::user()->hasPermission('Category_viewAny'))
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="menu-icon fa fa-list-alt"></i>Category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-tasks"></i><a href="{{ route('category.index') }}">Category</a></li>
                        @if (Auth::user()->hasPermission('Category_viewTrash'))
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('category.trash') }}">Trash</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                <!-- Product -->
                @if (Auth::user()->hasPermission('Product_viewAny'))
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-fire"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('product.index') }}">Product</a></li>
                        @if (Auth::user()->hasPermission('Product_viewTrash'))
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('product.trash') }}">Trash</a></li>
                        @endif
                    </ul>
                </li>
                @endif


                <!-- User -->
                @if (Auth::user()->hasPermission('User_viewAny') || Auth::user()->hasPermission('Group_viewAny'))
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa ti-user"></i>User</a>
                    <ul class="sub-menu children dropdown-menu">
                        @if (Auth::user()->hasPermission('User_viewAny'))
                        <li><i class="fa fa-user"></i><a href="{{ route('user.index') }}">User</a></li>
                        @endif
                        @if (Auth::user()->hasPermission('Group_viewAny'))
                        <li><i class="fa fa-users"></i><a href="{{ route('group.index') }}">Group User</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                <!-- Customer -->
                @if (Auth::user()->hasPermission('Customer_viewAny'))
                <li class="menu-item">
                    <a href="{{ route('order.index') }}"><i class="menu-icon fa fa-shopping-cart"></i>Customer</a>
                </li>
                @endif

                <!-- Customer -->
                @if (Auth::user()->hasPermission('Order_viewAny'))
                <li class="menu-item">
                    <a href="{{ route('customer.index') }}"><i class="menu-icon fa fa-users"></i>Customer</a>
                </li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>