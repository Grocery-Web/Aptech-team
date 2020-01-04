@extends('layouts.admin')

@section('body')

<div>
    <h1>Invoice Detail</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Product Image</th>
            <th>Invoice ID</th>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>

        @foreach($invoiceDetails as $invoiceDetail)
        <tr>
            <td>{{$invoiceDetail['id']}}</td>
            <td><img src="{{asset ('storage')}}/product_images/<?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->image; ?>" width="100" height="100" style="max-height:220px" ></td>
            <td>{{$invoiceDetail['invoice_id']}}</td>
            <td>{{$invoiceDetail['user_id']}}</td>
            <td>{{$invoiceDetail['product_id']}}</td>
            <td><?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->name; ?></td>
            <td>{{$invoiceDetail['product_quantity']}}</td>
            <td>{{$invoiceDetail['total']}}</td>
        </tr>

        @endforeach

        </tbody>
    </table>

</div>
@endsection