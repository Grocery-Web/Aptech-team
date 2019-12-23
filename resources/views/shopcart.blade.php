@extends('layouts.master')
@section('content')
<div class="shopcart-page">
    <div class="container shoplist">
        <h2 class="heading__title">
            Shop Cart
        </h2>
        @if(session()->has('cart'))
        <div class="row">
            <div class="col-md-9 shoplist__left">
                <div class="shoplist__item">
                    <div class="row">
                        <div class="col-md-2 shoplist__item--img">
                            <img src="https://via.placeholder.com/150" alt="">
                        </div>
                        <div class="col-md-5 shoplist__item--detail">
                            <div class="row shoplist__item--header">
                                Product Name
                            </div>
                            <div class="row shoplist__item--description">
                                Product Description
                            </div>
                            <div class="row shoplist__item--description">
                                <a href="#">Delete</a>
                            </div>
                        </div>
                        <div class="col-md-2 shoplist__item--quantity">
                            Quantity: (number here)
                        </div>
                        <div class="col-md-3 shoplist__item--price">
                            Price: (number here)
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 shoplist__right">
                <div class="row">
                    <span>
                        Quantity:
                    </span>
                    <strong>
                        9999999
                    </strong>
                </div>
                <hr>
                <div class="row">
                    <span>
                        Price:
                    </span>
                    <strong class="shoplist__right--price">
                        9999999
                    </strong>
                </div>
                <div class="buybtnposition">
                    <button type="button" href="{{ route('clearCart') }}"
                        class="btn btn-large btn-block btn-danger btn-checkout buybtn">Buy
                        now</a>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            Your Card is Empty. Back to &nbsp;<a href="./"> Homepage </a>
        </div>
        @endif
    </div>
</div>
@endsection
