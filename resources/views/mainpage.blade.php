@extends('layouts.master')
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
                    Home Essentials <br> - TABLE FANS.
                    <div class="home__carousel--title--text">
                        <p>It's Time To Start Shopping</p>
                    </div>
                    <button class="btn btn-dark">SHOP NOW</button>
                </div>
            </div>
            <div class="carousel-item embed-responsive-item home__carousel--img2">
                <div class="home__carousel--title">
                    Home Essentials
                    <div class="home__carousel--title--text">
                        <p>For CEILING FANS</p>
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
        <div class="card-deck" style="background-color: white; margin-bottom: 3rem; border-radius:5px">
            <?php
                $count =0;
            ?>
            @foreach ($products as $product)
            <?php
                $count++;
            ?>
                    <div class="card list_item__card" style="margin-top:2rem">
                        <a href="{{ route('productDetails',['id' => $product->id])}}"> <img class="card-img-top list_item__card--img" src="{{asset ('storage')}}/product_images/{{$product['image']}}" alt="">
                            <div class="card-body list_item__card--body">
                                <h4 class="card-title list_item__card--title">{{$product->name}}</h4>
                                <p class="card-text list_item__card--text" style="font-weight:700">
                                    ${{$product->price}}</p>
                            </div>
                        </a>
                    </div>
                    <?php
                        if ($count % 2 == 0) {
                            echo'<div class="w-100 d-none d-sm-block d-md-none"></div>';
                            //wrap every 2 on sm
                        };
                        if ($count % 3 == 0){
                            echo '<div class="w-100 d-none d-md-block d-lg-none">
                        </div>';
                        // <!-- wrap every 3 on md-->
                        }
                        if ($count % 4 == 0){
                            echo '<div class="w-100 d-none d-lg-block d-xl-none"></div>';
                        // <!-- wrap every 4 on lg-->
                        }
                        if ($count % 6 == 0){
                            echo'<div class="w-100 d-none d-xl-block">
                            </div>';
                        // <!-- wrap every 6 on xl-->
                        };
                    ?>
                @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $products->links() }}
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
