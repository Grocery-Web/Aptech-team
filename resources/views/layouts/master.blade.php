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
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}" />
    <script src="{{asset('css/font.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}" />
    <link rel="stylesheet" href="{{asset('css/aboutus.css')}}" />
    <link rel="stylesheet" href="{{asset('css/contactus.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sitemap.css')}}" />
    <link rel="shortcut icon" href="{{ asset('img/Favicon.ico') }}">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/67aa126bbd.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/product.js')}}"></script>
    @include('sweetalert::alert')
    <script>
        $('.delete').click(function() {
            var productId = $(this).attr('product_id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href ="../wishlist/removeItem/"+productId;
                }
            })
        })
    </script>
</body>

</html>
