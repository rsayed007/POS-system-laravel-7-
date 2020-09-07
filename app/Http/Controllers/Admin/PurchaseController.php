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
use Illuminate\Support\Facades\Auth;

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
        $purchases = Purchase::all();
        
        return \view('admin.purchase.purchase_add', compact('categories','units','suppliers','products','purchases'));
    }

    public function PurchaseStore(Request $request){
        // return $request->all();
        
        if ($request->category_id == null) {
            return \redirect()->back()->with('status','Wring!!! you do not select some item');
        }else {
            $request->validate([
                'supplier_id.*'      => 'required',
                'category_id.*'      => 'required',
                'product_id.*'      => 'required',
                'purchase_id.*'      => 'required',
                'buying_qut.*'      => 'required',
                'buying_price.*'      => 'required',
                'unit_price.*'      => 'required',
                  
            ]);

            $count_product = \count($request->product_id);
            for ($i=0; $i < $count_product; $i++) { 
                $purchase = new Purchase();
                $purchase->supplier_id  =$request->supplier_id[$i];
                $purchase->category_id  =$request->category_id[$i];
                $purchase->product_id   =$request->product_id[$i];
                $purchase->purchase_id  =$request->purchase_id[$i];
                $purchase->date         =Carbon::now();
                $purchase->description  =$request->description[$i];
                $purchase->buying_qut   =$request->buying_qunt[$i];
                $purchase->buying_price =$request->buying_price[$i];
                $purchase->unit_price   =$request->unit_price[$i];
                $purchase->created_by   =Auth::user()->name;
                $purchase->save();

            }
        }

 

        return redirect()->route('purchase-list')->with('status','Purchase successfully added');

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

    public function PurchasePending()
    {
        $pending_data = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return \view('admin.purchase.pending_list', \compact('pending_data'));
    }

    public function PendingApprove($id)
    {
        $purchase_item = Purchase::findOrFail($id);
        $product = Product::where('id',$purchase_item->product_id)->update([
            'quantity' =>$purchase_item->buying_qut
        ]);
        if ($product) {
            Purchase::findOrFail($id)->update([
                'status' => '1'
            ]);
        }

        return redirect()->back()->with('status','product approved');
    }
}
