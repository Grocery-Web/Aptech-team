@extends('layouts.admin')

@section('body')
<div>
    <h1>Display Category</h1>
    <a href="{{ route('addCategoryForm')}}" class="btn btn-primary">Add New</a>
</div>


<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Name</th>
            <th>Parent ID</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories as $category)
        <tr>
            <td>{{$category['id']}}</td>
            <td>{{$category['name']}}</td>
            <td>{{$category['parent_id']}}</td>

            <td><a href="{{ route('adminEditCateForm',['id' => $category['id'] ])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('adminDeleteCate',['id' => $category['id']])}}"  class="btn btn-warning">Remove</a></td>
        </tr>

        @endforeach

        </tbody>
    </table>

    {{-- {{$products->links()}} --}}

</div>
@endsection