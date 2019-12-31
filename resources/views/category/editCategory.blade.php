@extends('layouts.admin')

@section('body')

<h1>Update Category</h1>
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

    <form action="{{ route('adminUpdateCategory')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category['name'] }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="parent_id"
                class="col-md-2 col-form-label text-md-right">{{ __('Parent ID') }}</label>

            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="parent_id" id="parent_id"
                    style="border-radius:5px">
                    <option selected>{{NULL}}</option>
                    @foreach ($parentCate as $cate)
                    <option value="{{$cate['id']}}">{{$cate['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0 justify-content-center">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>

</div>
@endsection