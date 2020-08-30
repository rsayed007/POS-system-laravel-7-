<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use App\Product;
use App\Category;
use App\Purchase;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function PurchaseList(){
        $purchases = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return \view('admin.purchase.purchase_list', \compact('purchases'));
    }

    public function PurchaseAdd(){
        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();
        $products = Product::all();
        
        return \view('admin.purchase.purchase_add', compact('categories','units','suppliers','products'));
    }

    public function PurchaseStore(Request $request){

        $request->validate([
            'name'      => 'required|unique:Purchases',
            'updated_by' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'unit_id' => 'required',
            'status' => 'required',
        ]);

        $purchase = new Purchase();
        $purchase->name          = $request->name;
        $purchase->created_by    = $request->created_by;
        $purchase->supplier_id   = $request->supplier_id;
        $purchase->category_id   = $request->category_id;
        $purchase->quantity      = $request->quantity;
        $purchase->unit_id       = $request->unit_id;
        $purchase->status        = $request->status;


        $purchase->created_at = Carbon::now();
        $purchase->save();

        return redirect()->back()->with('status','Purchase successfully added');

    }


    
    public function PurchaseDelete($id){
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchase-list')->with('status','Purchase successfully deleted');
    }


    public function PurchaseEdit($id){

        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();

        $purchase = Purchase::findOrFail($id);
        return \view('admin.purchase.purchase_edit', \compact('purchase','categories','units','suppliers'));
    }


    public function PurchaseUpdate( Request $request, $id){

        $request->validate([
            'name'      => 'required',
            'updated_by' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'unit_id' => 'required',
            'status' => 'required',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->name = $request->name;
        $purchase->updated_by = $request->updated_by;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->category_id = $request->category_id;
        $purchase->quantity = $request->quantity;
        $purchase->unit_id = $request->unit_id;
        $purchase->status = $request->status;
        $purchase->created_at = Carbon::now();
        $purchase->save();

        return redirect()->route('purchase-list')->with('status','Purchase successfully updated');
    }
}
