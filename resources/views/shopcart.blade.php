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
                @foreach($cartItems->items as $item)
                <div class="shoplist__item">
                    <div class="row">
                        <div class="col-md-2 shoplist__item--img">
                            <img src="{{asset ('storage')}}/product_images/{{$item['data']['image']}}" alt=""
                                style="width:150px; height:150px">
                        </div>
                        <div class="col-md-5 shoplist__item--detail">
                            <div class="row shoplist__item--header" style="font-weight:700">
                                {{ $item['data']['name'] }}
                            </div>
                            <div class="row shoplist__item--description">
                                {{ $item['data']['description'] }}
                            </div>
                            <div class="row shoplist__item--description">
                                <a href="{{ route('deleteItemFromCart', ['id'=>$item['data']['id']]) }}">Remove</a>
                            </div>
                        </div>
                        <div class="col-md-2 shoplist__item--quantity" style="padding-left:1.5rem; padding-right:0">
                            Quantity: {{$item['totalSingleQuantity']}}
                        </div>
                        <div class="col-md-3 shoplist__item--price" style="padding-left: 1.5rem">
                            Price: ${{$item['totalSinglePrice']}}
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-2 shoplist__right">
                <div class="row">
                    <span>
                        Quantity:
                    </span>
                    <strong>
                        {{ $cartItems->totalQuantity }}
                    </strong>
                </div>
                <hr>
                <div class="row">
                    <span>
                        Price:
                    </span>
                    <strong class="shoplist__right--price">
                        ${{ $cartItems->totalPrice }}
                    </strong>
                </div>
            </div>
        </div>
        @if ($userData)
        <h2 class="heading__title">
            Shipping Information
        </h2>    
        <form action="{{route('clearCart', [$userData->id] )}}" method="POST">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="shipName" class="col-md-3 col-form-label">Your Name</label>
                <input class="form-control col-md-8" type="text" name="shipName" id="shipName" required>
            </div>
            <div class="form-group row">
                <label for="shipAddress" class="col-md-3 col-form-label">Your Shipping Address</label>
                <input class="form-control col-md-8" type="text" name="shipAddress" id="shipAddress" required>
            </div>
            <div class="form-group row">
                <label for="shipPhone" class="col-md-3 col-form-label">Your Phone</label>
                <input class="form-control col-md-8" type="number" name="shipPhone" id="shipPhone" required>
            </div>
            <div class="contaniner">
                <div class="row">
                    <div class="buybtnposition">
                        
                     
                            <button type="submit" class="btn btn-large btn-block btn-danger btn-checkout buybtn" style="text-decoration: none; width:100%">Buy
                                now</button>
                        
                    </div>
                </div>
            </div>
        </form>
        @else
        <a href="{{ route('login') }}" style="text-decoration: none; width:100%">
            <button type="button" class="btn btn-large btn-block btn-danger btn-checkout buybtn">You need to log in</button>
        </a>
        @endif
        @else
        <div class="row">
            Your Cart is Empty. Back to &nbsp;<a href="./">Homepage</a>
        </div>
        @endif
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
    </div>
</div>
@endsection
