<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use App\Product;
use App\Category;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ProductList(){
        $products = Product::all();
        return \view('admin.product.product_list', \compact('products'));
    }

    public function ProductAdd(){
        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();
        return \view('admin.product.product_add', compact('categories','units','suppliers'));
    }

    public function ProductStore(Request $request){

        $request->validate([
            'name'      => 'required|unique:products',
            'created_by' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'status' => 'required',
        ]);

        $product = new Product();
        $product->name          = $request->name;
        $product->created_by    = $request->created_by;
        $product->supplier_id   = $request->supplier_id;
        $product->category_id   = $request->category_id;
        $product->unit_id       = $request->unit_id;
        $product->status        = $request->status;


        $product->created_at = Carbon::now();
        $product->save();

        return redirect()->back()->with('status','Product successfully added');

    }


    
    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product-list')->with('status','Product successfully deleted');
    }


    public function ProductEdit($id){

        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();

        $product = Product::findOrFail($id);
        return \view('admin.product.product_edit', \compact('product','categories','units','suppliers'));
    }


    public function ProductUpdate( Request $request, $id){

        $request->validate([
            'name'      => 'required',
            'updated_by' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'status' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->updated_by = $request->updated_by;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->status = $request->status;
        $product->created_at = Carbon::now();
        $product->save();

        return redirect()->route('product-list')->with('status','Product successfully updated');
    }
}
