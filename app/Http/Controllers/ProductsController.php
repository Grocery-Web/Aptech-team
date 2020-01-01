<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use App\User;
use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ProductsPhoto;
use PDF;

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

        $quantity = $request->quantity;

        $product = Product::find($id);
        $cart->addItem($id, $product, $quantity);
        $request->session()->put('cart', $cart);

        return redirect('');

    }

    public function showCart() {
        $cart = Session::get('cart');

        // check cart is not empty
        if($cart) {
            return view('shopcart', ["cartItems"=> $cart]);
        // cart is null
        } else {
            return view('shopcart');
        }

    }

    public function deleteItemFromCart(Request $request, $id) {

        $cart = $request->session()->get('cart');

        if(array_key_exists($id, $cart->items)) {
            unset($cart->items[$id]);
        }

        $prevCart = $request->session()->get('cart');
        if(count($prevCart->items) != 0) {
            $updatedCart = new Cart($prevCart);
            $updatedCart->updatePriceAndQuantity();
            $request->session()->put('cart', $updatedCart);
        } else {
            $request->session()->forget('cart');
        }
        return redirect()->route('cartProducts');
    }

    public function clearCart($id) {
        $cart = Session::get('cart');
        $user = User::find($id);

        if($cart) {
            // add new invoice
            $newInvoiceData = array(
                'user_id' => $id,
                'total_quantity' => $cart->totalQuantity,
                'total_price' => $cart->totalPrice,
                'shipping_address' => $user->address,
                'status' => 'In progress'
            );
            DB::table('invoices')->insert($newInvoiceData);
            $newInvoice = DB::table('invoices')->latest('created_at')->first();

            // update product quantity
            foreach($cart->items as $item) {
                $product = Product::where('name', $item['data']['name'])->first();
                $product->quantity -= $item['totalSingleQuantity'];
                $product->save();

                // add new invoice detail
                $newInvoiceDetail = array(
                    'invoice_id' => $newInvoice->id,
                    'product_id' => $product->id,
                    'total' => $item['totalSinglePrice'],
                    'product_quantity' => $item['totalSingleQuantity']
                );
                DB::table('invoice_details')->insert($newInvoiceDetail);
            }
            Session::forget('cart');
        }



        return redirect()->route('cartProducts');
    }

    public function createPdf($id) {
        $pdf = PDF::loadView('createPdf');
        return $pdf->download('Product Information.pdf');
    }

    public function addReview(Request $request, $id, $user_id) {
        $headline = $request->headline;
        $content = $request->content;
        $newReviewData = array(
            'headline' => $headline,
            'content' => $content,
            'parent_id' => null,
            'product_id' => $id,
            'user_id' => $user_id,
            'level' => 'parent'
        );
        DB::table('reviews')->insert($newReviewData);
    }

}
