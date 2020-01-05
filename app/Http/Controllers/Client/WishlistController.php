<?php

namespace App\Http\Controllers\Client;

use App\Wishlist;
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

    public function addWishlist($user_id, $product_id)
    {
        $arrayToInsert = array('product_id' => $product_id, "user_id" => $user_id);

        $created  = DB::table("wishlists")->insert($arrayToInsert);

        if($created){
            return redirect()->route("productDetails",$product_id)->withSuccess('Item has been added into wishlist');
        }else{
            return redirect()->route("productDetails",$product_id)->withFail('Item has not been added into wishlist yet');
        }
    }
}
