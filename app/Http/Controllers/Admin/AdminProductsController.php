<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Product;
use App\ProductsPhoto;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


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
        $product          = Product::find($id);
        $subCategory = Category::where('parent_id','<>',NULL)->get();
        return view('admin.editProductForm', ['product' => $product, 'subCate' => $subCategory]);
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
        $name         =  $request->input('name');
        $description  =  $request->input('description');
        $weight       =  $request->input('weight');
        $width        =  $request->input('width');
        $depth        =  $request->input('depth');
        $height       =  $request->input('height');
        $producer     =  $request->input('producer');
        $cate_id      =  $request->input('cate_id');
        $quantity     =  $request->input('quantity');
        $price        =  $request->input('price');
        
        // Check existed name of product
        $newname = preg_replace('/\s+/', ' ' , $name);   //Replace multiple spaces with a single space
        $result = DB::table('products')->where([
            ['name', '=', $newname],
            ['id', '<>', $id],
        ])->get();
        if (count($result)) {
            return redirect()->route("adminEditProductForm",$id)->withFail('Name of product is exist');
        }
        // Update product info
        $arrayToUpdate = array(
            "name" => $name, "description" => $description, "weight" => $weight, "width" => $width, "depth" => $depth,
            "height" => $height, "producer" => $producer, "cate_id" => $cate_id, "price" => $price,
            "quantity" => $quantity
        );
        DB::table('products')->where('id', $id)->update($arrayToUpdate);
        return redirect()->route("adminDisplayProducts");
        // After finishing this function, you should update display image and related images again with new name 
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
        $subCategory = Category::where('parent_id','<>',NULL)->get();
        return view('admin.createProductForm',['subCate' => $subCategory]);
    }

    // Add new product
    public function sendCreateProductForm(Request $request)
    {
        $name         =  $request->input('name');
        $user         =  User::find(Auth::id());
        $description  =  $request->input('description');
        $weight       =  $request->input('weight');
        $width        =  $request->input('width');
        $depth        =  $request->input('depth');
        $height       =  $request->input('height');
        $producer     =  $request->input('producer');
        $cate_id      =  $request->input('cate_id');
        $quantity     =  $request->input('quantity');
        $price        =  $request->input('price');
        $photos       =  array();

        $newname = preg_replace('/\s+/', ' ' , $name);
        $result  =  DB::table('products')->where('name', $newname)->get();
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
            "name" => $name, "description" => $description, "weight" => $weight, "width" => $width, "depth" => $depth,
            "height" => $height, "producer" => $producer, "image" => $imageName, "cate_id" => $cate_id, "price" => $price,
            "quantity" => $quantity, "user_id" => $user['id']
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
            return redirect()->route("adminCreateProductForm")->withFail('Product was not Created');
        }
    }
    // Display related image of product panel
    public function displayRelatedImageForm($id)
    {
        $gallery    =   DB::table('products_photos')->where('product_id', $id)->get();
        return view('admin.displayRelatedImageForm', ['gallery' => $gallery]);
    }
    //Delete ralated product
    public function deleteRalatedProduct($id)
    {
        $photo    =   ProductsPhoto::find($id);
        // Delete display image in Storage
        $exists     =  Storage::disk("local")->exists("public/product_images/" . $photo['photos']);
        if ($exists) {
            Storage::delete('public/product_images/' . $photo['photos']);
        } else {
            return redirect()->route("adminDisplayRelatedImageForm", ['id' => $photo['product_id']])->withFail('Image does not exist');
        }
        ProductsPhoto::destroy($id);
        return redirect()->route("adminDisplayRelatedImageForm", ['id' => $photo['product_id']]);
    }
    // Display form for updating related image of product
    public function updateRelatedImageForm($id)
    {
        $photo    =   ProductsPhoto::find($id);
        return view('admin.updateRelatedImageForm', ['photo' => $photo]);
    }
    // Update related image of product
    public function updateRelatedImage(Request $request, $id)
    {
        // Delete display image in Storage
        Validator::make($request->all(), ['photos' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();


        if ($request->hasFile("photos")) {

            $photo      = ProductsPhoto::find($id);
            $imageName  =  $photo->photos;
            $exists = Storage::disk('local')->exists("public/product_images/" . $photo->photos);

            //delete old image
            if ($exists) {
                Storage::delete('public/product_images/' . $imageName);
            }

            //upload new image
            $ext = $request->file('photos')->getClientOriginalExtension(); //jpg

            $request->photos->storeAs("public/product_images/", $imageName);

            $arrayToUpdate = array('photos' => $imageName);
            DB::table('products_photos')->where('id', $id)->update($arrayToUpdate);

            return redirect()->route("adminDisplayRelatedImageForm", ['id' => $photo->product_id]);
        } else {

            $error = "NO Image was Selected";
            return $error;
        }
    }
}
