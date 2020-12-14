<?php

namespace App\Http\Controllers;

use App\User;
use App\VendorDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorsController extends Controller
{

    public function index(){
        return view('vendors.index');
    }
    public function edit($id){
        $user = User::find($id);
        return view('vendors.edit',compact('user'));
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
        $id->save();

        $vendorDetails = VendorDetails::where('user_id',$id->id)->first();
        if($vendorDetails){
            $vendorDetails->user_id = $id->id;
            $vendorDetails->store_name = $request->store_name;
            $vendorDetails->store_address = $request->store_address;
            $vendorDetails->store_description = $request->store_description;
            $vendorDetails->contact_number = $request->contact_number;
            $vendorDetails->phone_no = $request->phone_number;
            if($request->profile_pic !=null){
                $image = $request->profile_pic;
                $path = public_path(). '/uploads/profile_pic/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);

                $vendorDetails->profile_pic = $filename;
            }else{
                $vendorDetails->profile_pic = '';
            }
            if($request->banner_pic  !=null){
                $image = $request->banner_pic;
                $path = public_path(). '/uploads/banner_pic/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $vendorDetails->banner_pic = $filename;
            }else{
                $vendorDetails->banner_pic = '';
            }
            $vendorDetails->save();
        }
        return redirect()->back()->with('success','Vendor Updated successfully');
    }
}
