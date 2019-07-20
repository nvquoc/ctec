@if (Auth::user()->rule == 1)
    <!-- Admin Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <!-- Brand Logo -->
        <a href="admin" class="brand-link">
            <img src="assets/dist/img/logo.gif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">CTEC <i class="text-danger">SYSTEM</i></span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                <div class="image">
                    <img src="upload/website/avatar/{{ Auth::user()->avatar }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="admin/hoso" class="d-block">{{ Auth::user()->name }}
                        <a href="dangxuat"><i class="fa fa-sign-out text-success"></i> Đăng xuất</a>
                </div>
            </div>
    
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item mb-2">
                        <a href="admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Trang Chủ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="admin/menu" class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-bars"></i>
                            <p>
                                Menu
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2 has-treeview {{ request()->is('admin/baiviet*') ? 'menu-open' : '' }}">
                        <a href="admin/baiviet" class="nav-link {{ request()->is('admin/baiviet*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <p>
                                Bài Viết
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/baiviet/danhsach"
                                    class="nav-link {{ request()->is('admin/baiviet/danhsach') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/baiviet/them"
                                    class="nav-link {{ request()->is('admin/baiviet/them') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="admin/loaitin" class="nav-link {{ request()->is('admin/loaitin*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-bar-chart-o"></i>
                            <p>
                                Loại Tin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2 has-treeview {{ request()->is('admin/trang*') ? 'menu-open' : '' }}">
                        <a href="admin/trang" class="nav-link {{ request()->is('admin/trang*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-file-text"></i>
                            <p>
                                Trang
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/trang/danhsach"
                                    class="nav-link {{ request()->is('admin/trang/danhsach') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/trang/them"
                                    class="nav-link {{ request()->is('admin/trang/them') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="admin/filemanager"
                            class="nav-link {{ request()->is('admin/filemanager*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-folder-open"></i>
                            <p>
                                File Manager
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2 has-treeview {{ request()->is('admin/nguoidung*') ? 'menu-open' : '' }}">
                        <a href="admin/nguoidung" class="nav-link {{ request()->is('admin/nguoidung*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Người Dùng
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/nguoidung/danhsach"
                                    class="nav-link {{ request()->is('admin/nguoidung/danhsach') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/nguoidung/them"
                                    class="nav-link {{ request()->is('admin/nguoidung/them') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2 has-treeview {{ request()->is('admin/slides*') ? 'menu-open' : '' }}">
                        <a href="admin/slides" class="nav-link {{ request()->is('admin/slides*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                Slides
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/slides/danhsach"
                                    class="nav-link {{ request()->is('admin/slides/danhsach') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/slides/them"
                                    class="nav-link {{ request()->is('admin/slides/them') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="admin/caidat" class="nav-link {{ request()->is('admin/caidat*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Cài Đặt
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@else
    <!-- Admin Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <!-- Brand Logo -->
        <a href="admin" class="brand-link">
            <img src="assets/dist/img/logo.gif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">CTEC <i class="text-danger">SYSTEM</i></span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                <div class="image">
                    <img src="upload/website/avatar/{{ Auth::user()->avatar }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="admin/hoso" class="d-block">{{ Auth::user()->name }}
                        <a href="dangxuat"><i class="fa fa-sign-out text-success"></i> Đăng xuất</a>
                </div>
            </div>
    
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item mb-2">
                        <a href="admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Trang Chủ
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item mb-2">
                        <a href="admin/menu" class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-bars"></i>
                            <p>
                                Menu
                            </p>
                        </a>
                    </li> --}}
                    <li class="nav-item mb-2 has-treeview {{ request()->is('admin/baiviet*') ? 'menu-open' : '' }}">
                        <a href="admin/baiviet" class="nav-link {{ request()->is('admin/baiviet*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <p>
                                Bài Viết
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/baiviet/danhsach"
                                    class="nav-link {{ request()->is('admin/baiviet/danhsach') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/baiviet/them"
                                    class="nav-link {{ request()->is('admin/baiviet/them') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="admin/loaitin" class="nav-link {{ request()->is('admin/loaitin*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-bar-chart-o"></i>
                            <p>
                                Loại Tin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="admin/trang" class="nav-link {{ request()->is('admin/trang*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-file-text"></i>
                            <p>
                                Trang
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item mb-2">
                        <a href="admin/filemanager"
                            class="nav-link {{ request()->is('admin/filemanager*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-folder-open"></i>
                            <p>
                                File Manager
                            </p>
                        </a>
                    </li> --}}
                    <li class="nav-item mb-2">
                        <a href="admin/slides" class="nav-link {{ request()->is('admin/slide*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                Slides
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="admin/nguoidung" class="nav-link {{ request()->is('admin/nguoidung*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Thành Viên
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/hoso" class="nav-link {{ request()->is('admin/hoso*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                Thông tin Cá Nhân
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@endif