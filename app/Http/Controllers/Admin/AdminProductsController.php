<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;
use App\ProductsPhoto;

class AdminProductsController extends Controller
{
    //display all products in admin panel
    public function index()
    {
        $products = Product::all();
        return view("admin.displayProducts", ['products' => $products]);
    }

    // display edit product form
    public function editProductForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductForm', ['product' => $product]);
    }

    // display edit product image form
    public function editProductImageForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['product' => $product]);
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

    //Delete product
    public function deleteProduct($id)
    {

        $product    =   Product::find($id);

        // Delete all related images in Storage
        $photoInfo  =   DB::table('products_photos')->where('product_id', $id)->get()->toArray();
        foreach ($photoInfo as $key => $value) {
            $exists =   Storage::disk("local")->exists("public/product_images/" . $value->photos);
            if ($exists) {
                Storage::delete('public/product_images/' . $value->photos);
            }
        }

        // Delete display image in Storage
        $exists     =  Storage::disk("local")->exists("public/product_images/" . $product->image);
        if ($exists) {
            Storage::delete('public/product_images/' . $product->image);
        }

        $product->product_photo()->delete();
        Product::destroy($id);

        return redirect()->route("adminDisplayProducts");
    }

    // Call adding product form
    public function createProductForm()
    {
        return view('admin.createProductForm');
    }

    // Add new product
    public function sendCreateProductForm(Request $request)
    {
        $name         =  $request->input('name');
        $description  =  $request->input('description');
        $type         =  $request->input('type');
        $price        =  $request->input('price');
        $photos       =  array();

        $result  =  DB::table('products')->where('name', $name)->get();
        if (count($result)) {
            return redirect()->route("adminCreateProductForm")->withFail('Name of product is exist');
        }

        Validator::make($request->all(), [
            'image'     => "file|image|mimes:jpeg,png,jpg,gif,svg|max:5000",
            'photos.*'  => "file|image|mimes:jpeg,png,jpg,gif,svg|max:5000"
        ])->validate();

        // Store display image into Storage/app
        $path_upload = "/public/product_images/";
        $ext =  $request->file("image")->getClientOriginalExtension();
        $stringImageReFormat = str_replace(" ", "", $request->input('name'));

        $imageName = $stringImageReFormat . "." . $ext; //blackdress.jpg
        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put($path_upload . $imageName, $imageEncoded);

        //Store related images into Storage/app
        $arr_img = [];
        if ($photos = $request->file('photos')) {
            $i = 0;
            foreach ($photos as $photo) {
                $photoExt       =   $photo->getClientOriginalExtension();
                $photoName      =   $stringImageReFormat . "_" . $i . "." . $photoExt;
                $photo->move(base_path('storage/app/public/product_images'), $photoName);
                $arr_img[]      =   $photoName;
                $i++;
            }
        }
        // Create products with display image
        $newProductArray = array(
            "name" => $name, "description" => $description, "image" => $imageName,
            "type" => $type, "price" => $price
        );
        $created      = DB::table("products")->insert($newProductArray);
        // Add more related images to product
        $last         = DB::table('products')->orderBy('id', 'DESC')->first();

        foreach ($arr_img as $key => $value) {
            $insertPhoto = DB::table('products_photos')->insert(
                ['product_id' => $last->id, 'photos' => $value]
            );
        }

        if ($created && $insertPhoto) {
            return redirect()->route("adminDisplayProducts");
        } else {
            return "Product was not Created";
        }
    }
    // Display related image of product panel
    public function displayRelatedImageForm($id)
    {
        $product    =   Product::find($id);
        $gallery    =   DB::table('products_photos')->where('product_id', $id)->get();
        return view('admin.displayRelatedImageForm', ['gallery' => $gallery]);
    }
    // Delete related image of product panel
    public function deleteRalatedProduct($idDisplay,$id)
    {
        $photo      =  ProductsPhoto::find($id);
        // Delete display image in Storage
        $exists     =  Storage::disk("local")->exists("public/product_images/" . $photo['photos']);
        if ($exists) {
            Storage::delete('public/product_images/' . $photo['photos']);
        } else {
            return redirect()->route("adminDisplayRelatedImageForm", ['id' => $idDisplay])->withFail('Image does not exist');
        }
        ProductsPhoto::destroy($id);
        return redirect()->route("adminDisplayRelatedImageForm", ['id' => $idDisplay]);
    }
}
