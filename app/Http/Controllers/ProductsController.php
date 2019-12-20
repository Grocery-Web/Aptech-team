<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Cart;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
   
        return view("mainpage",compact("products"));
    }

    public function productDetails($id){
        $product    =   Product::find($id);
   
        return view("productDetail",compact("product"));
    }
}
