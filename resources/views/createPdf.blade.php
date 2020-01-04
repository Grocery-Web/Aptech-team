<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generator</title>
</head>

<body>
    {{-- <p>{{$product->image}}</p>
    <p>{{$product->price}}</p> --}}
    <h1>Product Name: {{$product->name}}</h1>
    <div class="wrapper">
        <div class="wrapper__img">
            <img style="width: 200px; height: 200px"  src="<?php echo public_path().'/storage/product_images/'.$product->image;?>"/>
        </div>
        <div class="wrapper__detail">
            <p>Product description: {{$product->description}}</p>
            <p>Manufacturer: {{$product->producer}} </p>

        <p>Price: <span class="price" style="color: #B12704">{{$product->price}}</span> </p>
        </div>
    </div>

</body>

</html>
