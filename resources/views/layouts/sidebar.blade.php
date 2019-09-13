<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            @if(Auth::user()->type->userTypeName==='admin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/category-add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    <li><a href="{{url('/category-list')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            @endif
            <li>
                <a href="{{url('/orders')}}">
                    <i class="fa fa-laptop"></i> <span>Order</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->type->userTypeName==='admin')
                    <li><a href="{{url('/product-add')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
                    @endif
                    <li><a href="{{url('/product-list')}}"><i class="fa fa-circle-o"></i>Product List</a></li>
                </ul>
            </li>
            @if(Auth::user()->type->userTypeName==='admin')
                <li>
                    <a href="{{url('/user-list')}}">
                        <i class="fa fa-edit"></i> <span>Users</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
              @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
