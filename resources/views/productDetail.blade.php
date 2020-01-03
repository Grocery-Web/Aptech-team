@extends('layouts.master')
@section('content')
<div class="container product">
    <div class="row">
        <div class="col-lg-5">
            <div class="product-carousel">
                @foreach ($gallery as $key => $value)
                <div>
                    <img src="{{asset ('storage')}}/product_images/{{$value->photos}}" alt="">
                </div>
                @endforeach
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
                <h4>${{$product['price']}}</h4>
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
            <hr class="mt-4">
            <div class="purchase d-flex flex-row flex-wrap align-items-center py-2">
                <form method="POST" action="{{route('addProductToCart', [$product['id']] )}}" class="numberInput d-flex align-items-stretch">
                    {{ csrf_field() }}
                    <button type="button" class="updown" id="minus" onclick="decreaseValue()" value="-">-</button>
                    <input type="number" id="quantity" min="1" step="1" value="1" name="quantity" />
                    <button type="button" class="updown" id="increase" onclick="increaseValue()" value="+">+</button>

                    <div class="addtocart ml-3 mr-3">
                        <button
                                type="submit" class="btn btn-dark"><i class="fas fa-shopping-cart mr-2"></i>ADD TO
                                CART</button>
                    </div>
                </form>
                <div class="wishlist">
                    <button type="button" class="btn btn-danger"><i class="far fa-heart mr-2"></i>ADD TO
                        WISHLIST</button>
                </div>
                <div class="pdf-download p-3">
                    <a href="{{route('createPdf', [$product['id']] )}}"><button type="button" class="btn btn-light"><img
                            src="https://img.icons8.com/ultraviolet/80/000000/export-pdf.png"></button> </a>
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
            <p class="mt-5">The Honeywell 12" Oscillating Table Fan can be implemented in a variety of settings to
                improve the overall quality of airflow. The inclusion of three speed settings and a round 12 in. head
                afford a wide customizable oscillation. An adjustable tilt fan head will provide owners the luxury of
                maneuvering the direction of their airflow at a moment's notice. Overall ease of use has been
                highlighted with the addition of quick touch button controls that simplify the process of selecting
                preferred settings. This table fan also comes equipped with a removable grille that will simplify the
                process of cleaning off accumulated dust and debris. The Honeywell 12" Oscillating Table Fan can provide
                instant relief in a personal setting (i.e. offices or small rooms).</p>
        </div>
        <div id="menu1" class="tab-pane">
            <table class="mt-5" style="width:50%">
                <tr>
                    <th>Product Dimensions</th>
                    <td>{{$product['depth']}} x {{$product['width']}} x {{$product['height']}} inches</td>
                </tr>
                <tr>
                    <th>Item Weight</th>
                    <td>{{$product['weight']}}</td>
                </tr>
                <tr>
                    <th>Shipping Weight</th>
                    <td>{{$product['weight']}}</td>
                </tr>
                <tr>
                    <th>Manufacturer</th>
                    <td>{{$product['producer']}}</td>
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
        <div id="menu2" class="tab-pane py-3">
            <small>Purchased this product already ? Tell us what you think.</small><br>
            @if ($userData)
                <button type="button" class="btn btn-success btn-lg font-weight-light mt-2" data-toggle="collapse"
                    data-target="#feedbackForm" aria-expanded="false" aria-controls="feedbackForm">Add your
                    review</button>
                <div class="collapse" id="feedbackForm">
                    <h5 class="mt-4 mb-3">CREATE REVIEW</h5>
                    <form method="POST" action="{{route('addReview', [$product['id'], $userData['id']] )}}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="reviewHeading">Add a headline *</label>
                                <input type="text" name="headline" class="form-control" id="reviewHeading"
                                    placeholder="What's most important to know?" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Textarea1">Your review *</label>
                                <textarea class="form-control" name="content" id="Textarea1" rows="3"
                                    placeholder="What did you like or dislike?" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"><button type="button" class="btn btn-success btn-lg font-weight-light mt-2" >Add your
                review</button></a>
            @endif
            @if (count($reviews) == 0)
                <div class="p-3 mt-4 bg-secondary text-white">There are currently <span>no</span> feedbacks.</div>
            @elseif (count($reviews) == 1)
                <div class="p-3 mt-4 bg-secondary text-white">There is currently <span>1</span> feedback.</div>
            @else
                <div class="p-3 mt-4 bg-secondary text-white">There are currently <span><?php echo count($reviews) ?></span> feedbacks.</div>
            @endif
            <div class="customer-feedback row mt-4">
                @foreach ($reviews as $review)
                    @if ($review->level == 'parent')
                    <div class="col-md-3 mb-5 text-center">
                        <img src="{{asset ('storage')}}/user_images/<?php $user = DB::table('users')->where('id', $review->user_id)->get(); echo $user[0]->avatar; ?>" class="rounded-circle" height="60" width="60">
                        <h6 class="mt-1"><?php $user = DB::table('users')->where('id', $review->user_id)->get(); echo $user[0]->name; ?></h6>
                    </div>
                    <div class="col-md-9 border-left border-success mb-5">
                        <h6 class="mb-1">{{ $review->headline }}</h6>
                        @if ($invoiceDetail->contains('user_id', $review->user_id))
                            <img src="https://img.icons8.com/color/25/000000/checked-checkbox.png">
                            <small class="text-success">Verified Purchaser</small>
                        @endif
                        <p class="my-2">{{ $review->content }}</p>
                        @if ($userData)
                        <div class="d-flex justify-content-between">
                            <a class="text-success" data-toggle="collapse" href="#replyForm{{ $review->id }}"   role="button" aria-expanded="false"
                                aria-controls="replyForm{{ $review->id }}">Reply</a>
                            <button type="button" class="btn btn-outline-light btn-sm deleteComment">
                                <img src="https://img.icons8.com/ios-glyphs/24/000000/delete-forever.png">
                            </button>
                        </div>
                        <form class="collapse mt-2" id="replyForm{{ $review->id }}" method="POST" action="{{route('addReply', [$product['id'], $userData['id'], $review->id] )}}">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea name="content" class="form-control" id="replyArea" rows="4"
                                        placeholder="Write your reply here. Maximum words allowed is 1500."
                                        required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        @else
                            <a class="text-primary" href="{{ route('login') }}" role="button" >Reply</a>
                        @endif
                        @foreach ($reviews as $reply)
                            @if ($reply->parent_id == $review->id)
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <img src="{{asset ('storage')}}/user_images/<?php $user = DB::table('users')->where('id', $reply->user_id)->get(); echo $user[0]->avatar; ?>"
                                            class="rounded-circle" height="60" width="60">
                                    </div>
                                    <div class="col-md-11">
                                        <h6><?php $user = DB::table('users')->where('id', $reply->user_id)->get(); echo $user[0]->name; ?></h6>
                                        <div class="d-flex justify-content-between">
                                            <p>{{ $reply->content }}</p>
                                            <button type="button" class="btn btn-outline-light btn-sm deleteComment">
                                                <img src="https://img.icons8.com/ios-glyphs/24/000000/delete-forever.png">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End: Product Specification -->
@endsection