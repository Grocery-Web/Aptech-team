@extends('layouts.admin')

@section('body')

@if(Session::has('fail'))
<div class="alert alert-danger">
    {{Session::get('fail')}}
</div>
@endif

<div class="table-responsive">

    <form action="/admin/updateProduct/{{$product->id}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" 
            value="{{$product['name']}}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="description"
            value="{{$product['description']}}"    required>
        </div>
        <div style="margin:0; padding: 0">
            <div class="row" style="margin:0; padding: 0">
                <div class="col-md-3" style="padding-left: 0">
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight" 
                        value="{{$product['weight']}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="width">Width</label>
                        <input type="text" class="form-control" name="width" id="width" placeholder="width" 
                        value="{{$product['width']}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="depth">Depth</label>
                        <input type="text" class="form-control" name="depth" id="depth" placeholder="Depth" 
                        value="{{$product['depth']}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="height">Height </label>
                        <input type="text" class="form-control" name="height" id="height" placeholder="height" 
                        value="{{$product['height']}}"required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="producer">Producer</label>
                    <input type="text" class="form-control" name="producer" id="producer" placeholder="Producer"
                    value="{{$product['producer']}}"    required>
                </div>
                <div class="col-md-6">
                    <label for="Quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity"
                    value="{{$product['quantity']}}"    required>
                </div>
            </div>

        </div>
        <select class="custom-select custom-select-lg mb-3" name="type" id="type"
            style="margin-bottom: 2rem; padding: 1rem; border-radius:5px">
            <option selected>Choose your products type ...</option>
            <option value="CEILING FANS">CEILING FANS</option>
            <option value="TABLE FANS">TABLE FANS</option>
            <option value="EXHAUST FANS">EXHAUST FANS</option>
        </select>
        </div>
        <div class="form-group">
            <label for="type">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="price" 
            value="{{$product['price']}}" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
