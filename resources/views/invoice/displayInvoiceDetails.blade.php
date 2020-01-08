@extends('layouts.admin')

@section('body')

<div>
    <h1>Invoice Detail</h1>
    <h4>Customer's Information</h4>
    <div class="col-lg-7">
        <div class="clearfix"></div>
        <table class="table attributes mt-5">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td class="price">{{ $invoice->receiver_name }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{ $invoice->receiver_phone }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <td>Shipping Address</td>
                    <td>:</td>
                    <td>{{ $invoice->shipping_address }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<h4>Customer's Image</h4>
<img src="{{asset('storage')}}/user_images/<?php echo $user->avatar?>" style="width: 150px; height: 150px;">
<div class="clearfix"></div>

<div class="table-responsive">
    <h4>Product Detail List</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#id</th>
                <th>Product Image</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Producer</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>

            @foreach($invoiceDetails as $invoiceDetail)
            <tr>
                <td>{{$invoiceDetail['id']}}</td>
                <td><img src="{{asset ('storage')}}/product_images/<?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->image; ?>"
                        width="100" height="100" style="max-height:220px"></td>
                <td>{{$invoiceDetail['user_id']}}</td>
                <td>{{$invoiceDetail['product_id']}}</td>
                <td><?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->name; ?></td>
                <td><?php $product = DB::table('products')->where('id', $invoiceDetail->product_id)->get(); echo $product[0]->producer; ?></td>
                <td>{{$invoiceDetail['product_quantity']}}</td>
                <td>{{$invoiceDetail['total']}}</td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
@endsection
