<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/"> <img class="favicon" src="{{asset('img/Favicon.ico')}}" alt=""> </a>
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
                    <li class="dropdown-submenu">
                        <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">{{$category['name']}}</a>
                        @if (count($category->subcategory))
                        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                            @foreach ($category->subcategory as $subcategory)
                            <li>
                                <a href="/product/sortCategory/{{$subcategory['id']}}" class="dropdown-item">{{$subcategory->name}}</a>
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
        <form action="/search" method="GET" class="nav__search">
            <i class="material-icons nav__icon ">
                search
            </i>
            <div class="form-group form__text">
                <input type="text" class="form-control nav__search--form" name="search" id="search"
                value="{{request()->input('search')}}" placeholder="Search...">
                <button type='submit'>
                    <i class="material-icons nav__search--btn">
                        search
                    </i>
                    <div class="nav__search--arrow-up"></div>
                </button>
            </div>
        </form>
        <!-- Shop Cart  -->
        <div class="nav__shopcart">
            <a href="{{ route('cartProducts') }}" class="material-icons-outlined nav__icon"
                style="color: #f5f5f5cc; text-decoration:none">shop</a>
            <div class="form__text nav__shopcart--wrapper">
                <div class="nav__shopcart--arrow-up"></div>
                <div class="nav__shopcart--title">
                    your cart
                </div>
                <div class="nav__shopcart--item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 nav__shopcart--item--left">
                                Total Quantity
                            </div>
                            @if(session()->has('cart'))
                            <div class="col-md-4 nav__shopcart--item--right" style="color:black">
                                {{ session()->get('cart')->totalQuantity }}
                            </div>
                            @else
                            <div class="col-md-4 nav__shopcart--item--right" style="color:black">
                                0
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-8 nav__shopcart--item--left">
                                Total Price
                            </div>
                            @if(session()->has('cart'))
                            <div class="col-md-4 nav__shopcart--item--right" style="color:black">
                                {{ session()->get('cart')->totalPrice }}
                            </div>
                            @else
                            <div class="col-md-4 nav__shopcart--item--right" style="color:black">
                                0
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-8 nav__shopcart--item--left">
                                Currency
                            </div>
                            <div class="col-md-4 nav__shopcart--item--right" style="color:black">
                                USD
                            </div>
                        </div>
                        <div class="row">
                            <a href="{{ route('cartProducts') }}">
                                <div class="btn btn-primary nav__shopcart--btn">check out</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Cart -->
        <!-- Login btn -->
        <div class="nav__login">
            <a href="{{ route('login') }}"> <i class="material-icons nav__icon" style="color: #f5f5f5cc">
                    person_outline
                </i>
            </a>
            @if(Auth::check())
            <form class="form__text">
                <div class="nav__login--arrow-up"></div>
                <div class="nav__login__form" style="color:black">
                    <p>Email: {!! Auth::user()->email !!}</p>
                    <p>Name: {!! Auth::user()->name !!}</p>
                    <p><a href="">Check your invoice</a></p>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary" href="{{ url('/logout') }}"> Logout </a>
                </div>
            </form>
            @else
            <form class="form__text" style="width:80px; height:50px; transform: translateX(-20px)">
                <div class="nav__login--arrow-up" style="transform:translate(39px,-12px);"></div>
                <div class="nav__login__form">
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="">Log in</a>
                </div>
            </form>
            @endif
        </div>
        <!-- End Login btn -->

    </div>
</nav>
<!-- End Navbar -->
