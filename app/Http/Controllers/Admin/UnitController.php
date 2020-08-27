<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function UnitList(){
        $units = Unit::all();
        return \view('admin.unit.unit_list', \compact('units'));
    }

    public function UnitAdd(){
        return \view('admin.unit.unit_add');
    }

    public function UnitStore(Request $request){
        $request->validate([
            'name'      => 'required',
            'created_by' => 'required',
            'status' => 'required',
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->created_by = $request->created_by;
        $unit->status = $request->status;
        $unit->created_at = Carbon::now();
        $unit->save();

        return redirect()->route('unit-list');
    }


    
    public function UnitDelete($id){
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('unit-list')->with('status','Unit successfully deleted');
    }


    public function UnitEdit($id){
        $unit = Unit::findOrFail($id);
    
        return \view('admin.unit.unit_edit', \compact('unit'));
    }
    public function UnitUpdate( Request $request, $id){

        $request->validate([
            'name'      => 'required',
            'updated_by' => 'required',
            'status' => 'required',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->name = $request->name;
        $unit->updated_by = $request->updated_by;
        $unit->status = $request->status;
        $unit->created_at = Carbon::now();
        $unit->save();

        return redirect()->route('unit-list')->with('status','Unit successfully updated');
    }
}
