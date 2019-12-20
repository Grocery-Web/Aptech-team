<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Cart;
use Illuminate\Support\Facades\Session;
use App\ProductsPhoto;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
   
        return view("mainpage",compact("products"));
    }

    public function productDetails($id){
        $product    =   Product::find($id);
        $gallery    =   DB::table('products_photos')->where('product_id', $id)->get();
   
        return view("productDetail",['product' => $product, 'gallery' => $gallery]);
    }
}
