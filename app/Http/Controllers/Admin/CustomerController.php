<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    
    public function CustomerList(){
        $customers = Customer::all();
        return \view('admin.customer.customer_list', \compact('customers'));
    }

    public function CustomerAdd(){
        return \view('admin.customer.customer_add');
    }

    public function CustomerStore(Request $request){
        $request->validate([
            'name'      => 'required',
            'email' => 'email|unique:customers',
            'mobile' => 'required|numeric',
            'created_by' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->created_by = $request->created_by;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->created_at = Carbon::now();
        $customer->save();

        return redirect()->route('customer-list');
    }


    
    public function CustomerDelete($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer-list')->with('status','Customer successfully deleted');
    }


    public function CustomerEdit($id){
        $customer = Customer::findOrFail($id);
    
        return \view('admin.customer.customer_edit', \compact('customer'));
    }
    public function CustomerUpdate( Request $request, $id){

        $request->validate([
            'name'      => 'required',
            'email' => 'email',
            'mobile' => 'required|numeric',
            'updated_by' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->updated_by = $request->updated_by;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->created_at = Carbon::now();
        $customer->save();

        return redirect()->route('customer-list')->with('status','Customer successfully updated');
    }
    
}
