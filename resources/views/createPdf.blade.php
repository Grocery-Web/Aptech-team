<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generator</title>
</head>
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<body>
    <table id="vertical-1">
        <tr>
            <th>Product Image</th>
            <td><img style="width: 200px; height: 200px"  src="<?php echo public_path().'/storage/product_images/'.$product->image;?>"/></td>
        </tr>
        <tr>
            <th>Product Description</th>
            <td>{{$product->description}}</td>
        </tr>
        <tr>
            <th>Manufacturer</th>
            <td>{{$product->producer}} </td>
        </tr>
        <tr>
            <th>Price</th>
            <td><span class="price" style="color: #B12704">{{$product->price}}</span></td>
        </tr>
    </table>
</body>

</html>
