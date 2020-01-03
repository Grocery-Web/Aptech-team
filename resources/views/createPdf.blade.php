<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generator</title>
</head>

<body>
    <p>{{$product->image}}</p>
    <p>{{$product->price}}</p>
    <img src="<?php echo public_path().'/storage/product_images/'.$product->image;?>"/>
</body>

</html>
