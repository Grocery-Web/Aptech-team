@extends('layouts.master')
@section('content')
<div class="shopcart-page">
    <div class="container shoplist">
        <h2 class="heading__title">
            Order Management
        </h2>
        @if ($invoice and $invoiceDetails)
        <div class="row">
            <div class="col-md-9 shoplist__left">
                @foreach($invoiceDetails as $invoiceDetail)
                <div class="shoplist__item">
                    <div class="row">
                        <div class="col-md-2 shoplist__item--img">
                        <img src="{{asset ('storage')}}/product_images/<?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->image; ?>" alt="" style="width:150px; height:150px">
                        </div>
                        <div class="col-md-5 shoplist__item--detail">
                            <div class="row shoplist__item--header" style="font-weight:700">
                                <?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->name; ?>
                            </div>
                            <div class="row shoplist__item--description">
                                <?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->description; ?>
                            </div>
                        </div>
                        <div class="col-md-2 shoplist__item--quantity" style="padding-left:1.5rem; padding-right:0">
                            Quantity:  {{$invoiceDetail->product_quantity}}
                        </div>
                        <div class="col-md-3 shoplist__item--price" style="padding-left: 1.5rem" >
                            Price:  {{$invoiceDetail->total}}
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
            <div class="col-md-2 shoplist__right">
                <div class="row">
                    <span>
                        Quantity:
                    </span>
                    <strong>
                    {{ $invoice->total_quantity }}
                    </strong>
                </div>
                <hr>
                <div class="row">
                    <span>
                        Price:
                    </span>
                    <strong class="shoplist__right--price">
                    {{ $invoice->total_price }}
                    </strong>
                </div>
                <hr>
                <div class="row">
                    <span>
                        Status:
                    </span>
                    <strong class="shoplist__right--price">
                    {{ $invoice->status }}
                    </strong>
                </div>
                @if ($invoice->status == "Not approved yet")
                    <div class="buybtnposition">
                        <a href="{{ route('cancelOrder', ['id' => $userData['id']]) }}" style="text-decoration: none; width:100%">
                        <button type="button" class="btn btn-large btn-block btn-danger btn-checkout buybtn">Cancel this order</button>
                        </a>
                    </div>
                @endif
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
