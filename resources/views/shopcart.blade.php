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
                        <img src="{{asset ('storage')}}/product_images/{{$item['data']['image']}}" alt="" style="width:150px; height:150px">
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
                        <div class="col-md-2 shoplist__item--quantity">
                            Quantity:  {{$item['totalSingleQuantity']}}
                        </div>
                        <div class="col-md-3 shoplist__item--price">
                            Price:  ${{$item['totalSinglePrice']}}
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
                <div class="buybtnposition">
                    <a href="{{ route('clearCart', ['id' => $userData['id']]) }}" style="text-decoration: none; width:100%">
                    <button type="button" class="btn btn-large btn-block btn-danger btn-checkout buybtn">Buy now</button>
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            Your Card is Empty. Back to &nbsp;<a href="./"> Homepage </a>
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
