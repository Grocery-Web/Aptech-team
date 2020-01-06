@extends('layouts.master')
@section('content')
<div class="shopcart-page">
    <div class="container shoplist">
        <div>
            <h2>Your favourtire items</h2>
            <a href="/" class="btn btn-primary">Back to HomePage</a>
        </div>
        @if ($wishlist)
        <div class="row">
            <div class="col-md-9 shoplist__left">
                @foreach($wishlist as $list)
                {{-- {{dd($list->product)}} --}}
                <div class="shoplist__item">
                    <div class="row">
                        <div class="col-md-2 shoplist__item--img">
                        <img src="{{asset ('storage')}}/product_images/{{$list->product->image}}" alt="" style="width:150px; height:150px">
                        </div>
                        <div class="col-md-5 shoplist__item--detail">
                            <div class="row shoplist__item--header" style="font-weight:700">
                                {{$list->product->name}}
                            </div>
                            <div class="row shoplist__item--description">
                                {{$list->product->description}}
                            </div>
                        </div>
                        <div class="col-md-2 shoplist__item--quantity" style="padding-left:1.5rem; padding-right:0">
                            Producer:  {{$list->product->producer}}
                        </div>
                        <div class="col-md-3 shoplist__item--price" style="padding-left: 1.5rem" >
                            Price:  {{$list->product->price}}
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        @else
            <div class="row">
                You do not have favourite items. Back to &nbsp;<a href="../"> Homepage </a>
            </div>
        @endif
    </div>
</div>
@endsection
