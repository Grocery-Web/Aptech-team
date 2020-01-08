@extends('layouts.admin')

@section('body')

<h1>New User</h1>
<div class="table-responsive">

    @if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif

    <form action="{{route('adminAddNewAccount')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-md-2 col-form-label text-md-right">{{ __('Username') }}</label>

            <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        {{-- additional data --}}
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="avatar" class="col-md-2 col-form-label text-md-right">{{ __('Avatar') }}</label>

            <div class="col-md-6">
                <input type="file" class="" name="avatar" id="avatar">
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong><span style="color:red">{{ $message }}</span></strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="role_id"
                class="col-md-2 col-form-label text-md-right">{{ __('Role ID') }}</label>

            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="role_id" id="role_id"
                    style="border-radius:5px">
                    <option value="1">Superadmin</option>
                    <option value="2">Admin</option>
                    <option value="3">Client</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="role_id"
                class="col-md-2 col-form-label text-md-right">{{ __('Gender') }}</label>

            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="gender" id="gender"
                    style="border-radius:5px">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        {{-- end additional data --}}
        <div class="form-group row mb-0 justify-content-center">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
    </form>

</div>
@endsection