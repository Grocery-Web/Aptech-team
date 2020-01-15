@extends('layouts.admin')

@section('body')

<h1>Invoice Update</h1>

<div class="table-responsive">
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

    <form action="/invoice/updateInvoice/{{$invoice->id}}" method="post">

        {{csrf_field()}}
        <div class="form-group">
            <label for="receiver_name">Shipping Address</label>
            <input type="text" class="form-control" name="receiver_name" id="receiver_name" placeholder="Client's Name" value="{{$invoice['receiver_name']}}" required>
        </div>
        <div class="form-group">
            <label for="receiver_phone">Shipping Address</label>
            <input type="text" class="form-control" name="receiver_phone" id="receiver_phone" placeholder="Client's Phone" value="{{$invoice['receiver_phone']}}" required>
        </div>
        <div class="form-group">
            <label for="shipping_address">Shipping Address</label>
            <input type="text" class="form-control" name="shipping_address" id="shipping_address" placeholder="Client's Shipping Address" value="{{$invoice['shipping_address']}}" required>
        </div>
        <div class="form-group row">
            <label for="status"
                class="col-md-2 col-form-label text-md-right">Status</label>
            @if ($invoice->status == "Not approved yet")
            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="status" id="status" 
                    style="border-radius:5px">
                    <option value="Not approved yet" selected="selected">Not approved yet</option>
                    <option value="Approved">Approved</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            @elseif ($invoice->status == "Approved")
            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="status" id="status" 
                    style="border-radius:5px">
                    <option value="Approved" selected="selected">Approved</option>
                    <option value="On delivery">On delivery</option>
                    <option value="Successful">Successful</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            @elseif ($invoice->status == "On delivery")
            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="status" id="status" 
                    style="border-radius:5px">
                    <option value="On delivery" selected="selected">On delivery</option>
                    <option value="Successful">Successful</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            @else 
            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="status" id="status" 
                    style="border-radius:5px">
                    @if ($invoice->status == "Successful")
                    <option value="Successful">Successful</option>
                    @else
                    <option value="Cancelled">Cancelled</option>
                    @endif
                </select>
            </div>
            @endif
        </div>
</div>
<button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>

</div>
@endsection