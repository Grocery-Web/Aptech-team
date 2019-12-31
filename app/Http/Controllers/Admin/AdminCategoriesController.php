<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminCategoriesController extends Controller
{
    //display list of Categories
    public function index()
    {
        $categories = Category::all();
        return view("category.displayCategories", compact('categories'));
    }

    //display form adding new Category
    // public function addCategoryForm()
    // {
    //     $parentCategories = Category::where('parent_id',NULL)->get();
    //     return view("category.addCategory", ['parentCate' => $parentCategories]);
    // }

    //display form editing Category
    public function editCateForm($id)
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        $category         = Category::find($id);
        return view("category.editCategory", ['category' => $category, 'parentCate' => $parentCategories]);
    }

    //Update Category
    public function updateCategory(Request $request)
    {
        // $parentCategories = Category::where('parent_id',NULL)->get();
        // $category         = Category::find($id);
        // return view("category.editCategory", ['category' => $category, 'parentCate' => $parentCategories]);
    }

    //display form adding new Category
    // public function addCategoryForm()
    // {
    //     $parentCategories = Category::where('parent_id',NULL)->get();
    //     return view("category.addCategory", ['parentCate' => $parentCategories]);
    // }
}
