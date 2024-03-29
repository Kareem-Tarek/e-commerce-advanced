<!DOCTYPE html>
<html lang="en">

<!-- molla/index-15.html  22 Nov 2019 09:59:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-touch-icon.png">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png"> --}}
    {{-- <link rel="manifest" href="/assets/images/icons/site.html">
    <link rel="mask-icon" href="/assets/images/icons/safari-pinned-tab.svg" color="#666666"> --}}
    {{-- <link rel="shortcut icon" href="/assets/images/icons/favicon.ico"> --}}
    <!-- icon in the title -->
    <link rel="icon" href="/assets/images/logos/Anywhere-Anytime(1).png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logos/Anywhere-Anytime(1).png" type="image/x-icon">

    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/demos/demo-15.css">
    <link rel="stylesheet" href="/assets/css/my-custom-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('layouts.website.header')

    {{-- @include('layouts.website.register-now') --}}

    @yield('content')
    
    @include('layouts.website.scrollToUp')

    @include('layouts.website.footer')

    <!-- Plugins JS File -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/superfish.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/bootstrap-input-spinner.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="/assets/js/main.js"></script>
    @yield('scripts')
    <script src="/assets/js/demos/demo-15.js"></script>
</body>


<!-- molla/index-15.html  22 Nov 2019 10:00:09 GMT -->
</html>