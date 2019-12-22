<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
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

    public function addProductToCart(Request $request, $id) {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect('');

    }

    public function showCart() {
        $cart = Session::get('cart');

        // check cart is not empty
        if($cart) {
            return view('shopcart', ["cartItems"=> $cart]);
        // cart is empty
        } else {
            return view('shopcart');
        }

    }

    public function deleteItemFromCart(Request $request, $id) {

        $cart = $request->session()->get('cart');

        if(array_key_exists($id, $cart->items)) {
            unset($cart->items['id']);
        }

        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        return redirect()->route('cartProducts');
    }

    public function clearCart() {
        $cart = Session::get('cart');
        if($cart) {
            foreach($cart->items as $item) {
                $product = Product::find($item['data']['id']);
                $product->quantity -= $item['data']['waitedQuantity'];
            }
            unset($cart);
        }
        return redirect()->route('cartProducts');
    }
}
