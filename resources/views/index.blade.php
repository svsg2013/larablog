<!DOCTYPE html>
<html>
<head>
    <title>themelock.com - TrendyBlog | Premium Magazine Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="icon" href="favicon.png">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('trendyblog/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('trendyblog/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('trendyblog/css/weather.css')}}">
    <link rel="stylesheet" href="{{asset('trendyblog/css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('trendyblog/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('trendyblog/css/style.css')}}">


    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" media="(max-width:768px)" href="{{asset('trendyblog/css/responsive-0.css')}}">
    <link rel="stylesheet" type="text/css" media="(min-width:769px) and (max-width:992px)" href="{{asset('trendyblog/css/responsive-768.css')}}">
    <link rel="stylesheet" type="text/css" media="(min-width:993px) and (max-width:1200px)" href="{{asset('trendyblog/css/responsive-992.css')}}">
    <link rel="stylesheet" type="text/css" media="(min-width:1201px)" href="{{asset('trendyblog/css/responsive-1200.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,400,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- Wrapper -->
<div id="wrapper" class="wide">
    <!-- Header -->
    <header id="header" role="banner">
        <!-- Header meta -->
        @include('trendy.partial.nav')
        <!-- End Header meta -->
        <!-- Header main -->
        @include('trendy.partial.menu')
        <!-- End Header main -->
    </header><!-- End Header -->
    <!-- Section -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Main content -->
                @yield('main content')
                <!-- End Main content -->
                <!-- Sidebar -->
                @include('trendy.partial.sidebar')
                <!-- End Sidebar -->
            </div>
        </div>
    </section><!-- End Section -->
    <!-- Footer -->
    @include('trendy.partial.footer')
    <!-- End Footer -->
    <!-- Copyright -->
    @include('trendy.partial.copyright')
    <!-- End Copyright -->
</div><!-- End Wrapper -->

<!-- Scripts -->
<script type="text/javascript" src="{{asset('trendyblog/js/jqueryscript.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/jqueryuiscript.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/smoothscroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/magnific.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/fitvids.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/viewportchecker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('trendyblog/js/init.js')}}"></script>
</body>
</html>
