@extends('layouts.admin')

@section('body')

<h1>User Update</h1>

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

    <form action="/user/updateUserChange/{{$user->id}}" method="post">

        {{csrf_field()}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="{{$user['username']}}" required>
        </div>
        @if ($errors->has('username'))
        <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user['name']}}" required>
        </div>

        <div style="margin:0; padding: 0">
            <div class="row" style="margin:0; padding: 0">
                <div class="col-md-2" style="padding-left: 0">
                    <label for="role">Role_id</label>
                    <select class="custom-select custom-select-lg mb-3" name="role" id="role" style="margin-bottom: 2rem; padding: 1rem; border-radius:5px">
                        <option value="2" <?php echo $user['role_id'] == 2 ? "selected" : "" ?>>Admin</option>
                        <option value="3" <?php echo $user['role_id'] == 3 ? "selected" : "" ?>>Client</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                        <label class="form-check-label" for="gender">Male</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user['email']}}" required>
        </div>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{$user['phone']}}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$user['address']}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection