<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aha Magazine | Trang chu</title>

    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="">
@yield('meta')

<!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{asset('workshop/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('workshop/css/font-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('workshop/css/style.css')}}"/>
@yield('css')

<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('workshop/img/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('workshop/img/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('workshop/img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('workshop/img/apple-touch-icon-114x114.png')}}">

    <!-- Lazyload -->
    <script src="{{asset('workshop/js/lazysizes.min.js')}}"></script>

</head>
@section('body')
<body class="bg-light">
@show
<!-- Preloader -->
<div class="loader-mask">
    <div class="loader">
        <div></div>
    </div>
</div>

<!-- Bg Overlay -->
<div class="content-overlay"></div>

<!-- Sidenav -->
@include('workshop.partial.menuSide')
<!-- end sidenav -->

<main class="main oh" id="main">

    <!-- Navigation -->
    <header class="nav">

        <div class="nav__holder nav--sticky">
            <div class="container relative">
                <div class="flex-parent">

                    <!-- Side Menu Button -->
                    <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
                    </button> <!-- end Side menu button -->

                    <!-- Mobile logo -->
                @include('workshop.partial.mobileLogo')

                <!-- Nav-wrap -->
                @include('workshop.partial.menu')
                <!-- end nav-wrap -->

                    <!-- Nav Right -->
                    <div class="nav__right nav--align-right d-lg-flex">

                        <!-- Socials -->
                    @include('workshop.partial.social')

                    <!-- Search -->
                        @include('workshop.partial.search')

                    </div> <!-- end nav right -->

                </div> <!-- end flex-parent -->
            </div> <!-- end container -->

        </div>
    </header> <!-- end navigation -->

    <!-- Header -->
@include('workshop.partial.logoImg')
<!-- end header -->

    <!-- Trending Now -->
@include('workshop.partial.trend')

<!-- Featured Posts Grid -->
@include('workshop.partial.slide')
<!-- end featured posts grid -->

    <div class="main-container container mt-40" id="main-container">

        <!-- Content -->
    @yield('content')
    <!-- end content -->
    </div> <!-- end main container -->

    <!-- Footer -->
@include('workshop.partial.footer')
<!-- end footer -->

    <div id="back-to-top">
        <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>

</main> <!-- end main-wrapper -->


<!-- jQuery Scripts -->
<script src="{{asset('workshop/js/jquery.min.js')}}"></script>
<script src="{{asset('workshop/js/bootstrap.min.js')}}"></script>
<script src="{{asset('workshop/js/easing.min.js')}}"></script>
<script src="{{asset('workshop/js/owl-carousel.min.js')}}"></script>
<script src="{{asset('workshop/js/twitterFetcher_min.js')}}"></script>
<script src="{{asset('workshop/js/jquery.newsTicker.min.js')}}"></script>
<script src="{{asset('workshop/js/modernizr.min.js')}}"></script>
<script src="{{asset('workshop/js/scripts.js')}}"></script>
@yield('js')

</body>
</html>