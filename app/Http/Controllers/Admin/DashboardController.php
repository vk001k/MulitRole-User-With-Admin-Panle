<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function edit($id){
        $admin = User::where('id',$id)->first();
        return view('admin.edit',compact('admin'));
    }
    public function update(User $id,Request $request){
        if(!empty($request->password)){
            $validator = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        $id->email = $request->email;
        if(!empty($request->password)){
            $id->password = Hash::make($request->password);
        }
        $id->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }
}
