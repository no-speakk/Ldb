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
                    {{-- dashboard --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    {{-- laravel --}}
                    <li class="nav-item has-treeview {{ request()->is('ldb*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('ldb*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                لاراول
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- new project --}}
                            <li class="nav-item">
                                <a href="{{ route('ldb.new.project') }}" class="nav-link {{ request()->is('ldb/new/project') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon mr-4"></i>
                                    <p>شروع پروژه جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ldb.front') }}" class="nav-link {{ request()->is('ldb/front') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon mr-4"></i>
                                    <p>فرانت</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ldb.page.builder') }}" class="nav-link {{ request()->is('ldb/page/builder') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon mr-4"></i>
                                    <p>Page Builder</p>
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
