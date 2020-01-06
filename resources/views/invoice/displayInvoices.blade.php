@extends('layouts.admin')

@section('body')
<div>
    <h1>Invoices List</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>User ID</th>
            <th>Total Quantity</th>
            <th>Total Price</th>
            <th>Shipping Address</th>
            <th>Status</th>
            <th>View detail</th>
            <th>Edit</th>
            @if ($userData->role_id == 1) 
            <th>Remove</th>
            @endif
        </tr>
        </thead>
        <tbody>

        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice['id']}}</td>
            <td>{{$invoice['user_id']}}</td>
            <td>{{$invoice['total_quantity']}}</td>
            <td>${{$invoice['total_price']}}</td>
            <td>{{$invoice['shipping_address']}}</td>
            <td>{{$invoice['status']}}</td>

            <td><a href="{{ route('adminDisplayInvoiceDetails',['id' => $invoice['id'] ])}}" class="btn btn-primary">View detail</a></td>
            <td><a href="{{ route('editInvoiceForm',['id' => $invoice['id'] ])}}" class="btn btn-primary">Edit</a></td>
            @if ($userData->role_id == 1) 
            <td><a href="{{ route('adminRemoveInvoice',['id' => $invoice['id']])}}"  class="btn btn-warning">Remove</a></td>
            @endif


        </tr>

        @endforeach

        </tbody>
    </table>


</div>
@endsection