<?php

namespace App\Http\Controllers;

use App\Notifications\NotifyAdmin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        return view('users.index');
    }
    public function edit($id){
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }
    public function update(Request $request, User $id){

        if(!empty($request->password)){
            $validator = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        $id->fname = $request->fname;
        $id->lname = $request->lname;
        $id->address = $request->address;
        if(!empty($request->password)){
            $id->password = Hash::make($request->password);
        }
        $id->google_id = '';
        $id->facebook_id = '';
        $id->save();

        //notify admin
        $admin = User::where('role_id',3)->first();
        $admin->notify(new NotifyAdmin($id));
        return redirect()->back()->with('success','User Updated successfully');
    }
}
