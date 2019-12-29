@extends('layouts.admin')

@section('body')

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td><img src="{{asset ('storage')}}/user_images/{{$user['avatar']}}" alt="{{asset ('storage')}}/product_images/{{$user['avatar']}}" width="100" height="100" style="max-height:220px" ></td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['username']}}</td>
            <td>{{$user['role_id']}}</td>

            <td><a href="{{route('adminEditUserForm',['id' => $user['id'] ])}}" class="btn btn-primary">Alter</a></td>
            <td><a href="{{route('adminDeleteUser',['id' => $user['id'] ])}}"  class="btn btn-warning">Remove</a></td>
        </tr>

        @endforeach

        </tbody>
    </table>

</div>
@endsection