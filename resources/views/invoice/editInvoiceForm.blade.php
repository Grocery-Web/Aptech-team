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
            <label for="shipping_address">Shipping Address</label>
            <input type="text" class="form-control" name="shipping_address" id="shipping_address" placeholder="Client's Shipping Address" value="{{$invoice['shipping_address']}}" required>
        </div>
        <div class="form-group row">
            <label for="status"
                class="col-md-2 col-form-label text-md-right">Status</label>

            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="status" id="status" 
                    style="border-radius:5px">
                    <option selected="selected">{{ $invoice->status }}</option>
                    <option value="Not approved yet">Not approved yet</option>
                    <option value="Approved">Approved</option>
                    <option value="On delivery">On delivery</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        </div>
</div>
<button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>

</div>
@endsection