<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <!-- <li>
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li> -->
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                <!-- Category -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-list-alt"></i>Category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-tasks"></i><a href="{{ route('category.index') }}">Category</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('category.trash') }}">Trash</a></li>
                    </ul>
                </li>

                <!-- Product -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-fire"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('product.index') }}">Product</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('product.trash') }}">Trash</a></li>
                    </ul>
                </li>
                
                <!-- Customer -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-users"></i>Customer</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user"></i><a href="{{ route('customer.index') }}">Customer</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('customer.trash') }}">Trash</a></li>
                    </ul>
                </li>

                <!-- Order -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-shopping-cart"></i>Order</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-shopping-cart"></i><a href="{{ route('order.index') }}">Order</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('order.trash') }}">Order Trash</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{ route('orderdetail.trash') }}">OrderDetail Trash</a></li>
                    </ul>
                </li>

                <!-- User -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa ti-user"></i>User</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user"></i><a href="{{ route('user.index') }}">User</a></li>
                        <li><i class="fa fa-users"></i><a href="{{ route('group.index') }}">Group User</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>