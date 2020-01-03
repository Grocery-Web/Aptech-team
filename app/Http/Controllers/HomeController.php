<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

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

    public function test(){
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('test', compact('parentCategories'));
    }

    public function search(Request $request){
        $query = $request->search;
        $products = Product::where('name','like','%'.$query.'%')
                            ->orWhere('price',$query)
                            ->get();
        $parentCategories = Category::where('parent_id',NULL)->get();

        return view("mainpage", ['products' => $products, 'parentCategories' => $parentCategories]);
    }
}
