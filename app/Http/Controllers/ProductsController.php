<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use App\User;
use App\Invoice;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ProductsPhoto;
use PDF;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::paginate(12);
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view("mainpage", ['products' => $products, 'parentCategories' => $parentCategories]);
    }

    public function productDetails($id){
        $product    =   Product::find($id);
        $parentCategories = Category::where('parent_id',NULL)->get();
        $gallery    =   DB::table('products_photos')->where('product_id', $id)->get();
        $reviews    =   DB::table('reviews')->where('product_id', $id)->get();
        $invoiceDetail =  DB::table('invoice_details')->where('product_id', $id)->get();

        return view("productDetail",['product' => $product, 'gallery' => $gallery, 'reviews' => $reviews, 'parentCategories' => $parentCategories, 'invoiceDetail' => $invoiceDetail]);
    }

    public function addProductToCart(Request $request, $id) {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $quantity = $request->quantity;
        $product = Product::find($id);
        if ($product->quantity < $quantity) {
            return redirect()->back()->withFail('Your required quantity exceeded our available quantity! Please try again.');
        } else {
            $cart->addItem($id, $product, $quantity);
            $request->session()->put('cart', $cart);
            return redirect()->back()->withSuccess('Add to your cart successfully!');
        }
    }

    public function showCart() {
        $cart = Session::get('cart');
        $parentCategories = Category::where('parent_id',NULL)->get();

        // check cart is not empty
        if($cart) {

            return view('shopcart', ["cartItems"=> $cart,'parentCategories' => $parentCategories]);
        // cart is null
        } else {
            return view('shopcart',['parentCategories' => $parentCategories]);
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
                'status' => 'Not approved yet'
            );
            $created = DB::table('invoices')->insert($newInvoiceData);
            
            $newInvoiceID = Invoice::max('id');
            $newInvoice = Invoice::find($newInvoiceID);

            // update product quantity
            foreach($cart->items as $item) {
                $product = Product::where('name', $item['data']['name'])->first();
                $product->quantity -= $item['totalSingleQuantity'];
                $product->save();

                // add new invoice detail
                $newInvoiceDetail = array(
                    'invoice_id' => $newInvoice->id,
                    'user_id' => $id,
                    'product_id' => $product->id,
                    'total' => $item['totalSinglePrice'],
                    'product_quantity' => $item['totalSingleQuantity']
                );
                DB::table('invoice_details')->insert($newInvoiceDetail);
            }
            Session::forget('cart');
        }

        // check if payment was successful
        if($created){
            return redirect()->route("cartProducts")->withSuccess('Order Completed Successfully! Thank for your support.');
        } else{
            return redirect()->route("cartProducts")->withFail('Your order failed! Please try again.');
        }
    }

    public function createPdf($id) {
        $product    =   Product::find($id);
        $pdf = PDF::loadView('createPdf', ['product' => $product]);
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
        return redirect()->back();
    }

    public function addReply(Request $request, $id, $user_id, $parent_id) {
        $content = $request->content;
        $newReplyData = array(
            'headline' => null,
            'content' => $content,
            'parent_id' => $parent_id,
            'product_id' => $id,
            'user_id' => $user_id,
            'level' => 'child'
        );
        DB::table('reviews')->insert($newReplyData);
        return redirect()->back();
    }


    public function sortCategory($id) {
        $products  = Product::where('cate_id',$id)->paginate(4);
        $parentCategories = Category::where('parent_id',NULL)->get();
        $subCategory  = Category::find($id);
        return view("category.searchCate", ['products' => $products, 'parentCategories' => $parentCategories, 'subCategory' => $subCategory]);
    }

}
