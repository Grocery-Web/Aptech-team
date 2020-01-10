<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <script src="{{asset('css/font.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}" />
    <link rel="stylesheet" href="{{asset('css/aboutus.css')}}" />
    <link rel="stylesheet" href="{{asset('css/contactus.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sitemap.css')}}" />
    <link rel="shortcut icon" href="{{ asset('img/Favicon.ico') }}">
    <title>FANoFAN</title>
</head>

<body class="homepage">
    @include ('layouts.header')
    <!-- Content -->
    @yield('content')
    <!-- End Content -->
    @include('layouts.footer')
    <script src="{{asset('css/jquery.js')}}"></script>
    <script src="{{asset('css/poper.js')}}"></script>
    <script src="{{asset('css/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/slickjs.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/product.js')}}"></script>
    @include('sweetalert::alert')
    <script>
        $('.delete').click(function() {
            var productId = $(this).attr('product_id');
</body>

</html>
