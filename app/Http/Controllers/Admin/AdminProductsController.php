<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;

class AdminProductsController extends Controller
{
    //display all products in admin panel
    public function index()
    {
        $products = Product::all();
        return view("admin.displayProducts",['products'=>$products]);
    }

    // display edit product form
    public function editProductForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductForm',['product'=>$product]);
    }

    // display edit product image form
    public function editProductImageForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductImageForm',['product'=>$product]);
    }

    // Update product images
    public function updateProductImage(Request $request, $id)
    {
        Validator::make($request->all(), ['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();


        if ($request->hasFile("image")) {

            $product = Product::find($id);
            $exists = Storage::exists("public/product_images/" . $product->image);

            //delete old image
            if ($exists) {
                Storage::delete('public/product_images/' . $product->image);
            }

            //upload new image
            $ext = $request->file('image')->getClientOriginalExtension(); //jpg

            $request->image->storeAs("public/product_images/", $product->image);

            $arrayToUpdate = array('image' => $product->image);
            DB::table('products')->where('id', $id)->update($arrayToUpdate);


            return redirect()->route("adminDisplayProducts");
        } else {

            $error = "NO Image was Selected";
            return $error;
        }
    }

    // Update product info form
    public function updateProduct(Request $request, $id)
    {
        $name       =   $request->input('name');
        $desciption =   $request->input('description');
        $type       =   $request->input('type');
        $price      =   $request->input('price');

        $arrayToUpdate = array('name' => $name, 'description' => $desciption, 'type' => $type, 'price' => $price);
        DB::table('products')->where('id', $id)->update($arrayToUpdate);

        return redirect()->route("adminDisplayProducts");
    }
}
