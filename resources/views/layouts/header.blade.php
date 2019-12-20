<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="./"> <img class="favicon" src="{{asset('img/Favicon.ico')}}" alt=""> </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#headerNav" aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="headerNav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="category-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="category-menu">
                    <a class="dropdown-item" href="#">Ceiling Fans</a>
                    <a class="dropdown-item" href="#">Table Fans</a>
                    <a class="dropdown-item" href="#">Exhaust Fans</a>
                </div>
            </li>
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
        <form class="nav__search">
            <i class="material-icons nav__icon ">
                search
            </i>
            <div class="form-group form__text">
                <input type="text" class="form-control nav__search--form" name="form_search" id="" placeholder="Search...">
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
            <i class="material-icons-outlined nav__icon">shop</i>
            <div class="form__text nav__shopcart--wrapper">
                <div class="nav__shopcart--arrow-up"></div>
                <div class="nav__shopcart--title">
                    giỏ hàng
                </div>
                <div class="nav__shopcart--item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 nav__shopcart--item--left">
                                Số lượng sản phẩm
                            </div>
                            <div class="col-md-4 nav__shopcart--item--right">
                                10.000.000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 nav__shopcart--item--left">
                                Tổng tiền
                            </div>
                            <div class="col-md-4 nav__shopcart--item--right">
                                10.000.000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 nav__shopcart--item--left">
                                Đơn vị tính
                            </div>
                            <div class="col-md-4 nav__shopcart--item--right">
                                VND
                            </div>
                        </div>
                        <div class="row">
                            <a href="">
                                <div class="btn btn-primary nav__shopcart--btn ">thanh toán</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Cart -->
        <!-- Login btn -->
        <div class="nav__login">
            <a href="{{ route('login') }}"> <i class="material-icons nav__icon" style="color: #212529">
                    person_outline
                </i>
            </a>
            @if(Auth::check())
            <form class="form__text">
                <div class="nav__login--arrow-up"></div>
                <div class="nav__login__form">
                    <p>Email: {!! Auth::user()->email !!}</p>
                    <p>Name: {!! Auth::user()->name !!}</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-primary ">Log out</a>
                </div>
            </form>
            @else
            <form class="form__text" style="width:80px; height:50px; transform: translateX(-30px)">
                <div class="nav__login--arrow-up" style="transform:translate(50px,-12px);"></div>
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