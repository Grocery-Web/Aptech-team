@extends('layouts.app')

@section('content')

<div class="container">
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
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="{{asset ('storage')}}/user_images/{{$userData['avatar']}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $userData['name'] }}'s Profile</h2>

            <form action="updateAvatar/{{$userData['id']}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="avatar" class="col-md-2 col-form-label text-md-right">{{ __('Avatar') }}</label>
        
                    <div class="col-md-6">
                        <input type="file" name="avatar">
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong><span style="color:red">{{ $message }}</span></strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row mb-0 justify-content-center">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection