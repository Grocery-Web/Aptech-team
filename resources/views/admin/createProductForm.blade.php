@extends('layouts.admin')

@section('body')

<h1>New Product</h1>
<div class="table-responsive">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>

                <li>{!! print_r($errors->all()) !!}</li>

            </ul>
        </div>
    @endif

    @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif

    <form action="/admin/sendCreateProductForm" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="description"
                required>
        </div>
        <div style="margin:0; padding: 0">
            <div class="row" style="margin:0; padding: 0">
                <div class="col-md-3" style="padding-left: 0">
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="width">Width</label>
                        <input type="text" class="form-control" name="width" id="width" placeholder="width" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="depth">Depth</label>
                        <input type="text" class="form-control" name="depth" id="depth" placeholder="Depth" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="height">Height </label>
                        <input type="text" class="form-control" name="height" id="height" placeholder="height" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="producer">Producer</label>
                    <input type="text" class="form-control" name="producer" id="producer" placeholder="Producer"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="Quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity"
                    required>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="cate_id"
                class="col-md-2 col-form-label text-md-right">{{ __('Category ID') }}</label>

            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="cate_id" id="cate_id"
                    style="border-radius:5px">
                    @foreach ($subCate as $cate)
                    <option value="{{$cate['id']}}">{{$cate['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="image">Display Image</label>
            <input type="file" class="" name="image" id="image" required accept=".gif,.jpg,.jpeg,.png">
        </div>

        <div class="form-group">
            <label for="image">Related Images</label>
            <input multiple="multiple" name="photos[]" type="file" accept=".gif,.jpg,.jpeg,.png">
        </div>

        <div class="form-group">
            <label for="type">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="price" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
