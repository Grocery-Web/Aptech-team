<?php

namespace App\Http\Controllers\Client;

use App\Wishlist;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function displayWishlist($id)
    {
        $wishlistbyID = Wishlist::where('user_id',$id)->get();
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view("client.wishlist", ['wishlist' => $wishlistbyID, 'parentCategories' => $parentCategories]);
    }

    public function addWishlist($user_id, $product_id)
    {
        $arrayToInsert = array('product_id' => $product_id, "user_id" => $user_id);

        $created  = DB::table("wishlists")->insert($arrayToInsert);

        // Alert::success('Success Title', 'Success Message');
        if($created){
            return redirect()->route("productDetails",$product_id)->withSuccessMessage('Item has been added into wishlist');
        }else{
            return redirect()->route("productDetails",$product_id)->withFail('Item has not been added into wishlist yet');
        }
    }

    public function removeItem($product_id)
    {
        DB::table('wishlists')->where('product_id', $product_id)->delete();
        return back();
    }

}
