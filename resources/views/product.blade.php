@extends('layouts.master')
@section('content')
<!-- Product Information -->
<div class="container product">
        <div class="row">
            <div class="col-lg-5">
                <div class="product-carousel">
                    <div><img
                            src="https://images-na.ssl-images-amazon.com/images/I/91wFELT290L._SL1500_.jpg">
                    </div>
                    <div><img
                            src="https://images-na.ssl-images-amazon.com/images/I/81zmAUCA5vL._SL1500_.jpg  ">
                    </div>
                    <div><img
                            src="https://images-na.ssl-images-amazon.com/images/I/81Tq4at6PYL._SL1500_.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <h2>Honeywell Comfort Control Oscillating Table Fan Adjustable Tilt Head With 3 Speeds & Removeable Grill</h2>
                <div class="product-rating">
                    <div class="rate mb-2">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="price">
                    <h4>$101.00 – $111.00</h4>
                </div>
                <div class="product-summary mt-4">
                Introducing the Honeywell Comfort ControlTM Table Fan: This fan delivers quiet, powerful, personal cooling in a compact modern design. It can be placed on a tabletop for focused cooling or used on the floor directing airflow where you need it. The convenient oscillation feature and adjustable tilting fan head allow for multiple ways to cool. Built with a robust metal grille that can be removed for easy cleaning, this fan is a great solution for your personal cooling needs.
                </div>
                <div class="sku mt-4">SKU: <b><a href="#" class="text-dark">HTF1220B</a></b></div>
                <div class="categories mt-2">CATEGORIES: <b><a href="#" class="text-dark">TABLE FANS</a></b></div>
                <div class="product-color mt-2">COLOR:
                    <a href="#" class="text-decoration-none">
                        <div class="filter-color color_1 ml-3"></div>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <div class="filter-color color_2"></div>
                    </a>
                </div>
                <div class="product-size mt-2">SIZE:
                    <a href="#" class="badge badge-light ml-2">Extra Large</a>
                    <a href="#" class="badge badge-light ml-2">Large</a>
                    <a href="#" class="badge badge-light ml-2">Medium</a>
                    <a href="#" class="badge badge-light ml-2">Small</a>
                </div>
                <hr class="mt-4 mb-3">
                <div class="purchase d-flex flex-row flex-wrap mt-4">
                    <form class="numberInput mb-3">
                        <button type="button" id="minus" onclick="decreaseValue()" value="-">-</button>
                        <input type="number" id="quantity" min="0" step="1" value="0" />
                        <button type="button" id="increase" onclick="increaseValue()" value="+">+</button>
                    </form>
                    <div class="addtocart ml-3 mr-3">
                        <button type="button" class="btn btn-dark"><i class="fas fa-shopping-cart mr-2"></i>ADD TO CART</button>
                    </div>
                    <div class="wishlist">
                        <button type="button" class="btn btn-danger"><i class="far fa-heart mr-2"></i>ADD TO WISHLIST</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-10 shop-utilities d-flex align-items-center">
                <i class="fas fa-shipping-fast fa-2x mr-2"></i>
                <div>FREE <br> SHIPPING</div>
                <i class="fas fa-dollar-sign fa-2x ml-5 mr-2"></i>
                <div>100% MONEY <br> BACK GUARANTEE</div>
                <i class="fas fa-headset fa-2x ml-5 mr-2"></i>
                <div>ONLINE <br> SUPPORT 24/7</div>
            </div>
            <div class="col-lg-2 social-icon d-flex align-items-center">
                <a href="">
                    <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f text-primary fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="">
                    <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter text-info fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="">
                    <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-linkedin-in text-success fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="">
                    <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-google-plus-g text-danger fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="">
                    <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="far fa-envelope-open text-warning fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- End: Product Information -->
@endsection