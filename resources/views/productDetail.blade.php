@extends('layouts.master')
@section('content')

<div class="container product">
    @if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
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
            <div class="clearfix"></div>
            <table class="table attributes mt-5">
                <tbody>
                    <tr>
                        <td class="label">Price</td>
                        <td class="colon">:</td>
                        <td class="price">${{$product['price']}}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Product ID</td>
                        <td class="colon">:</td>
                        <td class="text-danger">{{$product['id']}}</td>
                    </tr>
                    <tr>
                        <td class="label">Available Quantity</td>
                        <td class="colon">:</td>
                        @if ($product->quantity == 0)
                        <td class="text-danger">Sold Out</td>
                        @else
                        <td>{{$product['quantity']}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="label">Category</td>
                        <td class="colon">:</td>
                        <td><b><?php $cate = DB::table('categories')->where('id', $product['cate_id'])->get(); ?> {{$cate[0]->name}}</b></td>
                    </tr>
                </tbody>
            </table>
            <hr id="line1">
            <div class="purchase d-flex flex-row flex-wrap align-items-center py-2">
                <form method="POST" action="{{route('addProductToCart', [$product['id']] )}}" class="numberInput d-flex align-items-stretch">
                    {{ csrf_field() }}
                    <button type="button" class="updown" id="minus" onclick="decreaseValue()" value="-">-</button>
                    <input type="number" id="quantity" min="1" step="1" value="1" name="quantity" />
                    <button type="button" class="updown" id="increase" onclick="increaseValue()" value="+">+</button>

                    <div class="addtocart ml-3 mr-3">
                        <button type="submit" class="btn btn-dark"><i class="fas fa-shopping-cart mr-2"></i>ADD TO
                            CART</button>
                    </div>
                </form>
                @if(Auth::check())
                <div class="wishlist">
                    @php
                    $matchThese = ['product_id' => $product['id'], 'user_id' => $userData['id']];
                    $results = App\Wishlist::where($matchThese)->count();
                    @endphp
                    @if ($results)
                    <a href="{{ route('clientRemoveItem',['product_id' => $product['id']])}}">
                        <button type="button" class="btn btn-danger"><i class="far fa-heart mr-2"></i>
                            REMOVE FROM WISHLIST</button>
                    </a>
                    @else
                    <a href="{{ route('clientAddWishlist', ['product_id' => $product['id'],'user_id' => $userData['id']] ) }}">
                        <button type="button" class="btn btn-danger"><i class="far fa-heart mr-2"></i>ADD TO
                            WISHLIST</button>
                    </a>
                    @endif

                </div>
                @endif

                <div class="pdf-download p-3">
                    <a href="{{route('createPdf', [$product['id']] )}}"><button type="button" class="btn btn-light"><img src="https://img.icons8.com/ultraviolet/80/000000/export-pdf.png"></button> </a>
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

        <!-- Description Tab -->
        <div id="home" class="tab-pane in active">
            <p class="mt-4">{{$product['description']}}</p>
        </div>
        <!-- End: Description Tab -->

        <!-- Product Information Tab -->
        <div id="menu1" class="tab-pane">
            <table class="mt-4" style="width:50%">
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
            </table>
        </div>
        <!-- End: Product Information Tab -->

        <!-- Customer Feedback Tab -->
        <div id="menu2" class="tab-pane py-3">
            <small>Purchased this product already ? Tell us what you think.</small><br>
            @if ($userData)
            <button type="button" class="btn btn-success btn-lg font-weight-light mt-2" data-toggle="collapse" data-target="#feedbackForm" aria-expanded="false" aria-controls="feedbackForm">Add your
                review</button>
            <div class="collapse" id="feedbackForm">
                <h5 class="mt-4 mb-3">CREATE REVIEW</h5>
                <form method="POST" action="{{route('addReview', [$product['id'], $userData['id']] )}}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reviewHeading">Add a headline *</label>
                            <input type="text" name="headline" class="form-control" id="reviewHeading" placeholder="What's most important to know?" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Textarea1">Your review *</label>
                            <textarea class="form-control" name="content" id="Textarea1" rows="3" placeholder="What did you like or dislike?" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            @else
            <a href="{{ route('login') }}"><button type="button" class="btn btn-success btn-lg font-weight-light mt-2">Add your
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
                    <img src="{{asset ('storage')}}/user_images/<?php $user = DB::table('users')->where('id', $review->user_id)->get();
                                                                echo $user[0]->avatar; ?>" class="rounded-circle" height="60" width="60">
                    <h6 class="mt-1"><?php $user = DB::table('users')->where('id', $review->user_id)->get();
                                        echo $user[0]->name; ?></h6>
                </div>
                <div class="col-md-9 border-left border-success mb-5">
                    <h6 class="mb-1 reviewHead">{{ $review->headline }}</h6>
                    @if ($invoiceDetail->contains('user_id', $review->user_id))
                    <img src="{{asset('img/verified.png')}}" height="15" width="15">
                    <small class="text-success">Verified Purchaser</small>
                    @endif
                    <p class="my-2">{{ $review->content }}</p>
                    @if ($userData)
                    <div class="d-flex justify-content-between">
                        <a class="text-success" data-toggle="collapse" href="#replyForm{{ $review->id }}" role="button" aria-expanded="false" aria-controls="replyForm{{ $review->id }}">Reply</a>
                        @if ($review->user_id == $userData->id or $userData->id == 1)
                        <a href="{{ route('deleteReview', ['id' => $review->id]) }}"><button type="button" class="btn btn-outline-light btn-sm p-1 deleteComment">
                                <img src="https://img.icons8.com/material-rounded/24/000000/delete-forever.png">
                            </button></a>
                        @endif
                    </div>
                    <form class="collapse mt-2" id="replyForm{{ $review->id }}" method="POST" action="{{route('addReply', [$product['id'], $userData['id'], $review->id] )}}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea name="content" class="form-control" id="replyArea" rows="4" placeholder="Write your reply here. Maximum words allowed is 1500." required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    @else
                    <a class="text-primary" href="{{ route('login') }}" role="button">Reply</a>
                    @endif
                    @foreach ($reviews as $reply)
                    @if ($reply->parent_id == $review->id)
                    <div class="row mt-3">
                        <div class="col-md-1">
                            <img src="{{asset ('storage')}}/user_images/<?php $user = DB::table('users')->where('id', $reply->user_id)->get();
                                                                        echo $user[0]->avatar; ?>" class="rounded-circle" height="60" width="60">
                        </div>
                        <div class="col-md-11">
                            <h6><?php $user = DB::table('users')->where('id', $reply->user_id)->get();
                                echo $user[0]->name; ?></h6>
                            <div class="d-flex justify-content-between">
                                <p>{{ $reply->content }}</p>
                                @if ($reply->user_id == $userData->id or $userData->id == 1)
                                <a href="{{ route('deleteReview', ['id' => $reply->id]) }}"><button type="button" class="btn btn-outline-light btn-sm p-1 deleteComment">
                                        <img src="https://img.icons8.com/material-rounded/24/000000/delete-forever.png">
                                    </button></a>
                                @endif
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
        <!-- End: Customer Feedback Tab -->

    </div>
</div>
<!-- End: Product Specification -->
@endsection