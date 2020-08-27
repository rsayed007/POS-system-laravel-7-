<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function CategoryList(){
        $categories = Category::all();
        return \view('admin.category.category_list', \compact('categories'));
    }

    public function CategoryAdd(){
        return \view('admin.category.category_add');
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'name'      => 'required|unique:categories',
            'created_by' => 'required',
            'status' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->created_by = $request->created_by;
        $category->status = $request->status;
        $category->created_at = Carbon::now();
        $category->save();

        return redirect()->route('category-list');
    }


    
    public function CategoryDelete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category-list')->with('status','Category successfully deleted');
    }


    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return \view('admin.category.category_edit', \compact('category'));
    }


    public function CategoryUpdate( Request $request, $id){

        $request->validate([
            'name'      => 'required',
            'updated_by' => 'required',
            'status' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->updated_by = $request->updated_by;
        $category->status = $request->status;
        $category->created_at = Carbon::now();
        $category->save();

        return redirect()->route('category-list')->with('status','Category successfully updated');
    }
}
