@extends('layouts.admin')

@section('body')

<h1>Related Images</h1>

@if(Session::has('fail'))
<div class="alert alert-danger">
    {{Session::get('fail')}}
</div>
@endif

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Related Image</th>
            <th>Name</th>
            <th>Edit Image</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gallery as $key => $value)
            <tr>
                <td>{{$value->id}}</td>
                <td><img src="{{asset ('storage')}}/product_images/{{$value->photos}}" alt="{{asset ('storage')}}/product_images/{{$value->photos}}}" width="100" height="100" style="max-height:220px" ></td>
                <td>{{$value->photos}}</td>
                {{-- Button Control --}}
                <td><a href="{{ route('adminUpdateRelatedImageForm',['id' => $value->id])}}" class="btn btn-primary">Edit Image</a></td>
                <td><a href="{{ route('adminDeleteRalatedProduct',['id' => $value->id])}}"  class="btn btn-warning">Remove</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection