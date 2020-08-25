<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserList(){
        $userData = User::all();
        return view('admin.user_list', \compact('userData'));
    }
    public function UserAdd(){
        // $userData = User::all();
        return view('admin.user_add');
    }

    public function UserStore(Request $request)
    {

        $request->validate([
            'name'      => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'is_admin' => 'required|numeric',
            'password' => 'required|min:8',
        ]);

        $userInsert = User::insert([
            'name'          => $request->name,
            'email'         => $request->email,
            'mobile'        => $request->mobile,
            'is_admin'      => $request->is_admin,
            'password'      => Hash::make($request->password),
            'created_at'    => Carbon::now(),
        ]);


        return redirect('admin/user/list')->with('status','User successfully added');
    }

    public function UserDelete($id){

        User::findOrFail($id)->delete();
        return back()->with('status','User Deleted successfully');

    }

    public function UserEdit($id){
        $singleUserData = User::findOrFail($id);
        return view('admin.user_edit', \compact('singleUserData'));
    }

    public function UserUpdate(Request $request){

        $request->validate([
            'name'      => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'is_admin' => 'required|numeric',
        ]);

        $updateUser = User::find($request->id);
        $updateUser->name = $request->name;
        $updateUser->email = $request->email;
        $updateUser->mobile = $request->mobile;
        $updateUser->is_admin = $request->is_admin;
        $updateUser->save();

        return redirect('admin/user/list')->with('status','User successfully Update');
    }
}
