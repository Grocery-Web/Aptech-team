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
    public function createCategoryForm()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view("category.addCategory", ['parentCate' => $parentCategories]);
    }

    //Add new Category
    public function addNewCategory(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
        ]);

        $name         =  $request->name;
        $parent_id  =  $request->parent_id;

        // Check unique username
        $result = DB::table('categories')->where([
            ['name', '=', $name]
        ])->get();
        if (count($result)) {
            return redirect()->route("adminCreateCategoryForm")->withFail('Name has aldready taken');
        }
        
        $arrayToInsert = array('name' => $name, "parent_id" => $parent_id);

        $created  = DB::table("categories")->insert($arrayToInsert);

        if($created){
            return redirect()->route("adminCreateCategoryForm")->withSuccess('Categories has already created');
        }else{
            return redirect()->route("adminCreateCategoryForm")->withFail('Categories has not created yet');
        }
    }

    //display form editing Category
    public function editCateForm($id)
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        $category         = Category::find($id);
        return view("category.editCategory", ['category' => $category, 'parentCate' => $parentCategories]);
    }

    //Update Category
    public function updateCategory(Request $request,$id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
        ]);

        $name       =  $request->name;
        $parent_id  =  $request->parent_id;

        // Check unique username
        $result = DB::table('categories')->where([
            ['name', '=', $name],
            ['id', '<>', $id],
        ])->get();
        if (count($result)) {
            return redirect()->route("adminEditCateForm",$id)->withFail('Name has aldready taken');
        }
        
        $arrayToUpdate = array('name' => $name, "parent_id" => $parent_id);
        $created = DB::table('categories')->where('id', $id)->update($arrayToUpdate);

        if($created){
            return redirect()->route("adminEditCateForm",$id)->withSuccess('Categories has already updated');
        }else{
            return redirect()->route("adminEditCateForm",$id)->withFail('Categories has not updated yet');
        }
        
    }
}
