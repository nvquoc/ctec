
<div class="block-content">

    <!-- header title -->
    <div class="header-title">
        <span class="h-title">
            <i class="fa fa-bars"></i> MENU
        </span>
    </div>
    <!-- End Header title -->
                    
    <!-- Right Menu -->
    <div class="right-menu">
        <div class="menu-block bg-info wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="loaitin/thoi-khoa-bieu"> THỜI KHÓA BIỂU</a>
        </div>
        <div class="menu-block bg-danger wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="loaitin/lich-tuan"> LỊCH TUẦN</a>
        </div>
        <div class="menu-block bg-primary wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="loaitin/lich-thi"> LỊCH THI</a>
        </div>
        <div class="menu-block bg-info wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="http://115.79.42.45:9090/htqlctec/www/" target="_blank"> QL ĐÀO TẠO</a>
        </div>
        <div class="menu-block bg-warning wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="http://ctec.edu.vn/qlcv/" target="_blank"> QL CÔNG VĂN</a>
        </div>
        <div class="menu-block bg-success wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="loaitin/tuyen-dung"> TUYỂN DỤNG</a>
        </div>
        {{-- <div class="menu-block bg-primary wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="http://ctec.edu.vn/DIEMTRUNGCAP/" target="_blank"> KQ THI TCCN</a>
        </div> --}}
        <div class="menu-block bg-danger wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="loaitin/viec-lam-sinh-vien"> VIỆC LÀM SV</a>
        </div>
        <div class="menu-block bg-primary wow slideInUp">
            <i class="fa fa-check text-white ml-3"></i>
            <a href="loaitin/bieu-mau-sinh-vien"> BIỂU MẪU SV</a>
        </div>
    </div>
    <!-- End Right Menu -->

    <!-- header title -->
    <div class="header-title">
        <span class="h-title">
            <i class="fa fa-star text-warning"></i> Tin Nổi Bật
        </span>
    </div>
    <!-- End Header title -->

    <!-- Hot Post -->
    <div class="post-hot">
        <div class="hot-link title">
            <ul>
                @foreach ($posts_hot as $post_hot)
                <li class="wow slideInUp">
                    <a href="baiviet/{{ $post_hot->slug }}.html">{{ $post_hot->title }}</a>
                    <img src="upload/website/icon/newicon_vi.gif" alt="">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- End Hot Post -->

    <!-- header title -->
    <div class="header-title">
        <span class="h-title">
            <i class="fa fa-facebook-official"></i> Fanpage
        </span>
    </div>
    <!-- End Header title -->

    <!-- Facebook Fanpage -->
    <div class="fb-pg">
        <iframe class="w-100"
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftruongcdktktct%2F&tabs&width=255&height=240&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
            width="255" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowTransparency="true" allow="encrypted-media">
        </iframe>
    </div>
    <!-- End Facebook Fanpage -->

</div>