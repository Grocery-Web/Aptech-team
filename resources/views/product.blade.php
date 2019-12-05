@extends('layout.master')
@section('content')
<!-- Product Information -->
<div class="container-fluid product">
        <div class="row">
            <div class="col-lg-5">
                <div class="product-carousel">
                    <div><img
                            src="https://www.portotheme.com/wordpress/porto/shop3/wp-content/uploads/sites/22/2019/03/product-20-600x600.jpg">
                    </div>
                    <div><img
                            src="https://www.portotheme.com/wordpress/porto/shop3/wp-content/uploads/sites/22/2018/04/product-48-600x600.jpg">
                    </div>
                    <div><img
                            src="https://www.portotheme.com/wordpress/porto/shop3/wp-content/uploads/sites/22/2018/04/product-48-600x600.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <h2>Glasses</h2>
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
                    <h2>$101.00 – $111.00</h2>
                </div>
                <div class="product-summary mt-4">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur.
                </div>
                <div class="sku mt-4">SKU: <b><a href="#" class="text-dark">PT0003-1</a></b></div>
                <div class="categories mt-2">CATEGORIES: <b><a href="#" class="text-dark">WATCHES</a></b></div>
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
                <hr class="mt-4 mb-4">
                <div class="purchase d-flex flex-row flex-wrap mt-5">
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
                <hr class="mt-4 mb-4">
            </div>
        </div>
    </div>
    <!-- End: Product Information -->
@endsection