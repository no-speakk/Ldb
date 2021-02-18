<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--        <a href="index3.html" class="brand-link">--}}
{{--            <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                 style="opacity: .8">--}}
{{--            <span class="brand-text font-weight-light">پنل مدیریت</span>--}}
{{--        </a>--}}

<!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">محمد اسماعیلی</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview menu-open">
                        <a href="/inventory" class="nav-link active">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                منوی اول
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('inventory') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>زیرمنوی۱</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('inventory/create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>زیرمنو۲</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('inventory/archive') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>زیرمنو۳</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
