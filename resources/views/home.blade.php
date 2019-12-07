@extends('layout.master')
@section('content')
<!-- Carousel -->
<div class="homepage-page">
    <div id="header__carousel" class="carousel slide home__carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#header__carousel" data-slide-to="0" class="active"></li>
            <li data-target="#header__carousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner embed-responsive embed-responsive-21by9 ">
            <!-- Carousel items have `.embed-responsive-item` -->
            <div class="carousel-item embed-responsive-item home__carousel--img1 active ">
                <div class="home__carousel--title">
                    Winter Sale <br> Get 30% OFF <br> On JACKETS.
                    <div class="home__carousel--title--text">
                        <p>It's Time To Start Shopping Porto's Winter Sale</p>
                    </div>
                    <button class="btn btn-dark">SHOP NOW</button>
                </div>
            </div>
            <div class="carousel-item embed-responsive-item home__carousel--img2">
                <div class="home__carousel--title">
                    New Campaign Sale <br> UP to 65%
                    <div class="home__carousel--title--text">
                        <p>Fashion for Women</p>
                    </div>
                    <button class="btn btn-dark">SHOP NOW</button>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#header__carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#header__carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel -->
    <div class="container hot_deal">
        <div class="row">
            <h2 class="heading__title">
                Hot Deal
            </h2>
            <div class="hot_deal__time_left">Time left</div>
        </div>
        <div class="card-deck hot_deal__card">
            <div class="card mb-4" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150px*160px" class="card-img hot_deal__card--img"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body hot_deal__card--body">
                            <h5 class="card-title  hot_deal__card--title">Card title</h5>
                            <p class="card-text hot_deal__card--text">This is a wider card with supporting text below as
                                a natural lead-in to
                                .</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150px*160px" class="card-img hot_deal__card--img"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body hot_deal__card--body">
                            <h5 class="card-title  hot_deal__card--title">Card title</h5>
                            <p class="card-text hot_deal__card--text">This is a wider card with supporting text below as
                                a natural lead-in to
                                .</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150px*160px" class="card-img hot_deal__card--img"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body hot_deal__card--body">
                            <h5 class="card-title  hot_deal__card--title">Card title</h5>
                            <p class="card-text hot_deal__card--text">This is a wider card with supporting text below as
                                a natural lead-in to
                                .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hot Deals -->
    <!-- Categories -->
    <div class="container category">
        <h2 class="heading__title">
            Shop By Category
        </h2>
        <div class="row">
            <div class="category__item">
                <div class="category__item--title">
                    Ceiling Fans
                </div>
                <div class="category__item--img">
                    <img src="{{asset('img/ceiling-fans.png')}}" alt="">
                </div>
            </div>
            <div class="category__item">
                <div class="category__item--title">
                    Table Fans
                </div>
                <div class="category__item--img">
                    <img src="{{asset('img/tablefans.jpg')}}" alt="">
                </div>
            </div>
            <div class="category__item">
                <div class="category__item--title">
                    Exhaust Fans
                </div>
                <div class="category__item--img">
                    <img src="{{asset('img/exhaust.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->
    <!-- List items -->
    <div class="container list_item">
        <h2 class="heading__title">
            Popular Products
        </h2>
        <div class="card-deck">
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none">
                <!-- wrap every 2 on sm-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-md-block d-lg-none">
                <!-- wrap every 3 on md-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none">
                <!-- wrap every 2 on sm-->
            </div>
            <div class="w-100 d-none d-lg-block d-xl-none">
                <!-- wrap every 4 on lg-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-md-block d-lg-none">
                <!-- wrap every 3 on md-->
            </div>
            <div class="w-100 d-none d-sm-block d-md-none">
                <!-- wrap every 2 on sm-->
            </div>
            <div class="w-100 d-none d-xl-block">
                <!-- wrap every 6 on xl-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none">
                <!-- wrap every 2 on sm-->
            </div>
            <div class="w-100 d-none d-lg-block d-xl-none">
                <!-- wrap every 4 on lg-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-md-block d-lg-none">
                <!-- wrap every 3 on md-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none">
                <!-- wrap every 2 on sm-->
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div class="card list_item__card">
                <img class="card-img-top list_item__card--img" src="https://via.placeholder.com/200px*200px" alt="">
                <div class="card-body list_item__card--body">
                    <h4 class="card-title list_item__card--title">Title</h4>
                    <p class="card-text list_item__card--text">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card List -->
    <!-- Newsletter -->
    <div class="container newsletter">
        <div class="row">
            <div class="col-md-2">
                <img src="{{URL::asset('img/newsletter.png')}}" alt="">
            </div>
            <div class="col-md-4">
                <div class="newsletter__wrapper">
                    <div class="row">
                        <h3 class="newsletter__wrapper--title">
                            SUBSCRIBE NEWSLETTER
                        </h3>
                    </div>
                    <div class="row">
                        <h5 class="newsletter__wrapper--text">
                            Get all the latest information on Events, Sales and Offers
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="newsletter__right">
                    <div class="row">
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="newsEmail" placeholder="Email address...">
                        </div>
                        <div class="col-md-3">
                            <a href="">
                                <div class="btn btn-primary newsletter__right--btn">SUBSCRIBE</div>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<hr>
<!-- End Newsletter -->
@endsection
