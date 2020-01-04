@extends('layouts.admin')

@section('body')

<h1>Add Related Image</h1>
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

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <form action="{{ route('adminAddRelatedImage',['id' => $product['id'] ])}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
            <label for="displayImage">Product Name</label>
            <input type="text" disabled  class="form-control" name="displayImage" id="displayImage" 
            value="{{$product['name']}}">
        </div>
        <div class="form-group">
            <label for="image">Add Related Images</label>
            <input multiple="multiple" name="photos[]" type="file">
        </div>
    
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection
