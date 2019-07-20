<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $site_description->value }}">
    <link rel="shortcut icon" href="upload/website/icon/{{ $site_icon->value }}" type="image/x-icon">
    <base href="{{ asset('') }}">

    <title>@yield('title') - {{ $site_title->value }}</title>

    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font-awesome Files -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Animate.css Files -->
    <link rel="stylesheet" href="bower_components/animate.css/animate.css">
    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header -->
    @include('layouts.header')
    <!-- End Header -->

    <!-- Main -->
    <main>
        <!-- Container -->
        <div class="container">
            <!-- Row Content -->
            <div class="row main-content">
                <!-- Left -->
                <div class="col-12 col-md-8 col-lg-9 bdr">

                    @yield('content')

                </div>
                <!-- End Left -->

                <!-- Right -->
                <div class="col-12 col-md-4 col-lg-3 sidebar">

                    <!-- Block Content -->
                    @include('layouts.sidebar')
                    <!-- End Block Content -->
                    
                </div>
                <!-- End Right -->
            </div>
            <!-- End Row Content -->
        </div>
        <!-- End Container -->
    </main>
    <!-- End Main -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- End Footer -->

    <!-- Jquery Files -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Popper.js Files -->
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <!-- Bootstrap Files -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Wow.js Files -->
    <script src="bower_components/wow/wow.min.js"></script>
    <!-- Main Script -->
    <script src="js/main.js"></script>
    <script>
        new WOW().init();
    </script>
    @yield('script')
</body>
</html>