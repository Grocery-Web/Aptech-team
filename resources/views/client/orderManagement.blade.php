@extends('layouts.master')
@section('content')
<div class="shopcart-page">
    <div class="container shoplist">
        <h2 class="heading__title">
            Order Management
        </h2>
        @if ($invoices->count() > 0)
        <div class="row">
            <div class="col-md-9 shoplist__left">
                @foreach($invoices as $invoice)
                <div class="shoplist__item">
                    <div class="row">
                        <!-- <div class="col-md-2 shoplist__item--img">
                        <img src="{{asset ('storage')}}/product_images/" alt="" style="width:150px; height:150px">
                        </div> -->
                        <div class="col-md-5 shoplist__item--detail">
                            <div class="row shoplist__item--header" style="font-weight:700">
                                Order ID:  {{ $invoice->id }}
                            </div>
                            <div class="row shoplist__item--description">
                                Shipping Address:  {{ $invoice->shipping_address }}
                            </div>
                            <div class="row shoplist__item--description">
                                <a href="{{ route('checkOrder', ['id' => $userData->id, 'order_id' => $invoice->id]) }}">See detail</a>
                            </div>
                        </div>
                        <div class="col-md-2 shoplist__item--quantity" style="padding-left:1.5rem; padding-right:0">
                            Quantity:  {{$invoice->total_quantity}}
                        </div>
                        <div class="col-md-3 shoplist__item--price" style="padding-left: 1.5rem" >
                            Price:  {{$invoice->total_price}}
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
        @else
        <div class="row">
            You have not placed order yet. Back to &nbsp;<a href="../"> Homepage </a>
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
