<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    @if (Auth::user()->rule == 1)
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Xem Trang Chủ</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="admin/hoso" class="nav-link">Hồ sơ</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="admin/caidat" class="nav-link">Cài Đặt</a>
            </li>
        </ul>
    @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Xem Trang Chủ</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="admin/hoso" class="nav-link">Hồ sơ</a>
            </li>
        </ul>
    @endif

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</nav>
<!-- /.navbar -->