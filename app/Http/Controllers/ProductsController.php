<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
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

    public function addProductToCart(Request $request, $id) {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route("login");

    }

    public function showCart() {
        $cart = Session::get('cart');

        // check cart is not empty
        if($cart) {
            return view('', ["cartItems"=> $cart]);
        // cart is empty
        } else {
            echo "Your cart is empty";
            return redirect()->route("login");
        }

    }
}
