<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function SupplierList(){
        $suppliers = Supplier::all();
        return \view('admin.supplier.supplier_list', \compact('suppliers'));
    }

    public function SupplierAdd(){
        return \view('admin.supplier.supplier_add');
    }
    public function SupplierStore(Request $request){
        $request->validate([
            'name'      => 'required',
            'email' => 'email|unique:suppliers',
            'mobile' => 'required|numeric',
            'created_by' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->created_by = $request->created_by;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->created_at = Carbon::now();
        $supplier->save();

        return redirect()->route('supplier-list');
    }

    public function SupplierDelete($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier-list')->with('status','Supplier successfully deleted');
    }
}
