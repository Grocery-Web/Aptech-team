<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function aboutUs()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('aboutUs', ['parentCategories' => $parentCategories]);
    }

    public function contactUs()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('contactUs', ['parentCategories' => $parentCategories]);
    }

    public function sitemap()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('sitemap', ['parentCategories' => $parentCategories]);
    }
    // Search Products
    public function search(Request $request){
        $query = $request->search;
        $products = Product::where('name','like','%'.$query.'%')
                            ->orWhere('price',$query)
                            ->paginate(6);
        $parentCategories = Category::where('parent_id',NULL)->get();

        return view("searchProduct", ['products' => $products, 'parentCategories' => $parentCategories]);
    }
}
