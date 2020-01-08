@extends('layouts.admin')

@section('body')

<h1>Related Image Update</h1>
<div class="table-responsive">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            <li>{!! print_r($errors->all()) !!}</li>

        </ul>
    </div>
    @endif

    <h3>Current Image</h3>
    <div><img src="{{asset ('storage')}}/product_images/{{$photo['photos']}}" width="100" height="100" style="max-height:220px" ></div>

    <form action="{{ route('adminUpdateRelatedImage',['id' => $photo['id']])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}



        <div class="form-group">
            <label for="description">Update Image</label>
            <input type="file" accept=".gif,.jpg,.jpeg,.png" class=""  name="photos" id="photos" placeholder="Image" value="{{$photo['photos']}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
