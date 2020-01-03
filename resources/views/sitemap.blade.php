@extends('layouts.master')
@section('content')
<!-- Site Map section -->
<div class="container sitemap">
    <h1 class="border-bottom border-dark text-primary">Sitemap</h1>
    <ul class="list-group"><a href="{{ url('/') }}"><h3>Homepage</h3></a>
        <li class="list-group-item"><p class="font-weight-bold mb-0">Categories</p>
            <ul class="list-group">

                @foreach ($parentCategories as $category)
                <a href="#"><li class="list-group-item">{{$category['name']}}</li></a>
                    @if (count($category->subcategory))
                    <ul class="list-group pl-4">
                        @foreach ($category->subcategory as $subcategory)
                        <a href="/product/category/{{$subcategory['id']}}"><li class="list-group-item font-italic">
                            {{$subcategory->name}}</li></a>
                        @endforeach
                    </ul>
                    @endif
                @endforeach
                
            </ul>
        
        </li>
        <a href="aboutUs"><li class="list-group-item">About Us</li></a>
        <a href="contactUs"><li class="list-group-item">Contact Us</li></a>
        <a href="sitemap"><li class="list-group-item">Sitemap</li></a>
        <a href="#"><li class="list-group-item">Search</li></a>
        <a href="{{ url('/cart') }}"><li class="list-group-item">Cart</li></a>
        <li class="list-group-item"><a href="{{ route('home') }}" class="font-weight-bold">User Account</a>
            <ul class="list-group">
                <a href="{{ route('login') }}"><li class="list-group-item">Log In</li></a>
                <a href="{{ url('/password/reset') }}"><li class="list-group-item">Password Retrieval</li></a>
                <a href="{{ route('register') }}"><li class="list-group-item">Register</li></a>
            </ul>
        </li>
    </ul>
</div>

<!-- End: Site Map section -->
@endsection