<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NormalController extends Controller
{
    public function LoadCategory(Request $request){
        $supplier_id = $request->supplier_id;
        
        $product_data = Product::with(['Category_Product'])->select('category_id')
                                ->where('supplier_id',$supplier_id )->groupBy('category_id')->get();
        // dd($product_data)->toArray;

        return \response()->json($product_data);
    }

    public function LoadProduct(Request $request){
        $category_id = $request->category_id;
        
        $product_data = Product::where('category_id',$category_id )->get();
        // dd($product_data)->toArray;

        return \response()->json($product_data);
    }

    public function LoadUnit(Request $request){
        $product_id = $request->product_id;
        
        $product_data = Product::with('Unit_Product')->where('id',$product_id )->get();
        // dd($product_data)->toArray;

        return \response()->json($product_data);
    }
}
