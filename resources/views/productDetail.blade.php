@extends('layouts.master')
@section('content')
<!-- Product Summary + purchase zone -->
@php
    // dd($product);
    // dd($product['name']);
    // dd($gallery);
    // foreach($gallery as $key => $value){
    //     dd($value->photos);
    // }
@endphp
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
                <h2>{{$product['name']}}</h2>
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
                    <h4>{{$product['price']}}</h4>
                </div>
                <div class="product-summary mt-4">
                {{$product['description']}}
                </div>
                <div class="sku mt-4">SKU: <b><a href="#" class="text-dark">HTF1220B</a></b></div>
                <div class="categories mt-2">CATEGORIES: <b><a href="#" class="text-dark">{{$product['type']}}</a></b></div>
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
    <!-- End: Product Summary + purchase zone -->
<!-- Product Specification -->
<div class="container spec mt-5 mb-5">
  <ul class="nav nav-tabs d-flex justify-content-around">
    <li><a data-toggle="tab" href="#home" class="active">DESCRIPTION</a></li>
    <li><a data-toggle="tab" href="#menu1">PRODUCT INFORMATION</a></li>
    <li><a data-toggle="tab" href="#menu2">CUSTOMER FEEDBACK</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane in active">
        <img src="https://m.media-amazon.com/images/S/aplus-media/sota/72729dbf-31b1-4cfd-ab89-fc75eefb968f.__CR0,54,400,400_PT0_SX300_V1___.jpg">
        <p class="mt-5">The Honeywell 12" Oscillating Table Fan can be implemented in a variety of settings to improve the overall quality of airflow. The inclusion of three speed settings and a round 12 in. head afford a wide customizable oscillation. An adjustable tilt fan head will provide owners the luxury of maneuvering the direction of their airflow at a moment's notice. Overall ease of use has been highlighted with the addition of quick touch button controls that simplify the process of selecting preferred settings. This table fan also comes equipped with a removable grille that will simplify the process of cleaning off accumulated dust and debris. The Honeywell 12" Oscillating Table Fan can provide instant relief in a personal setting (i.e. offices or small rooms).</p>
    </div>
    <div id="menu1" class="tab-pane">
        <table class="mt-5" style="width:50%">
            <tr>
              <th>Product Dimensions</th>
              <td>14.8 x 11.5 x 19.1 inches</td>
            </tr>
            <tr>
              <th>Item Weight</th>
              <td>8.5 pounds</td>
            </tr>
            <tr>
              <th>Shipping Weight</th>
              <td>8.5 pounds</td>
            </tr>
            <tr>
              <th>Manufacturer</th>
              <td>Honeywell</td>
            </tr>
            <tr>
              <th>ASIN</th>
              <td>B07C5Y1PFH</td>
            </tr>
            <tr>
              <th>Item model number</th>
              <td>HTF1220B</td>
            </tr>
        </table>
    </div>
    <div id="menu2" class="tab-pane">
        <h4 class="mt-3">Create Review</h4>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                   <label for="inputFirstname">Name *</label>
                   <input type="name" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                   <label for="inputEmail4">Email *</label>
                   <input type="email" class="form-control" id="inputEmail4" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                   <label for="inputCity">Address</label>
                   <input type="text" class="form-control" id="inputCity">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Textarea1">Your review *</label>
                    <textarea class="form-control" id="Textarea1" rows="3" placeholder="What did you like or dislike?" required ></textarea>
                </div>
            </div>      
           <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</div>

<!-- End: Product Specification -->
@endsection