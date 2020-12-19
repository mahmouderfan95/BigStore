<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap-rtl.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/hover-min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/effecthover.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/fontawesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>@yield('title')</title>
  </head>
    <body>
        <!-- Header Section Begin -->
        <header class="header-section">
            <!-- header top -->
            @include('site.includes.header-top')
            <!-- header top -->
            <div class="container">
                <!-- inner headr -->
                @include('site.includes.inner-header')
                <!-- inner header -->
            </div>
            {{--  <!-- nav -->
            @include('site.includes.nav-item')
            <!-- nav -->  --}}
        </header>
        <!-- Header End -->
        @yield('content')
        <!-- Footer Section Begin -->
        @include('site.includes.footer')
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="{{ asset('assets/site/js/jquery-3.4.1.js') }}"></script>
        <script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/site/js/main.js') }}"></script>
    </body>
</html>
