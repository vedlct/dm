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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/category-add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    <li><a href="{{url('/category-list')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/product-add')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
                    <li><a href="{{url('/product-list')}}"><i class="fa fa-circle-o"></i>Product List</a></li>
                </ul>
            </li>
            <li>
                <a href="{{url('/orders')}}">
                    <i class="fa fa-dashboard"></i> <span>Order</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
