<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5336ef90a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/Favicon.ico') }}">
    <title>Test</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="./"> <img class="favicon" src="{{asset('img/Favicon.ico')}}" alt=""> </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#headerNav"
            aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="headerNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- Level one dropdown -->
                <li class="nav-item dropdown">
                    <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">CATEGORIES</a>
                    <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">

                        @foreach ($parentCategories as $category)
                        {{-- @dd($category->subcategory); --}}
                        <li class="dropdown-submenu">
                            <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-item dropdown-toggle">{{$category['name']}}</a>
                            @if (count($category->subcategory))
                            <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                                @foreach ($category->subcategory as $subcategory)
                                <li>
                                    <a href="#" class="dropdown-item">{{$subcategory->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach


                    </ul>
                </li>
                <!-- End Level one -->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutUs') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sitemap') }}">Sitemap</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- End Navbar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/67aa126bbd.js" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
</body>

</html>