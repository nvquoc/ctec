<header>
    <!-- Container -->
    <div class="container">

        <!-- Top Banner -->
        <div id="top-baner" class="d-none d-sm-block">
            <img class="img-fluid" src="upload/website/banner/{{ $site_banner->value }}" alt="">
        </div>
        <!-- End Top Banner -->

        <!-- Main Menu -->
        @include('layouts.menu')
        <!-- End Main Menu -->

        <!-- Top Slides -->
        @include('layouts.slides')
        <!-- End Top Slides -->

    </div>
    <!-- End Container -->
</header>