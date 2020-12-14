<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\VendorDetails;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('role_id',2)->get();
        return view('admin.vendors.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        $user = new User();
        $user->role_id = 2;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->address = $request->store_address;
        $user->email = $request->email;
        $user->reg_by = 'Web';
        $user->password = Hash::make($request->password);
        $user->save();

        $vendorDetails = new  VendorDetails();
        $vendorDetails->user_id = $user->id;
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
        return redirect(route('admin.vendors'))->with('success','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('vendorDetails')->find($id);
        return view('admin.vendors.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        $validator = $request->validate([
            'email' => 'unique:users,email,'.$id->id,
        ]);
        if(!empty($request->password)){
            $validator = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }


        $id->fname = $request->fname;
        $id->lname = $request->lname;
        $id->email = $request->email;
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
            if($request->has('profile_pic')){
                $image = $request->profile_pic;
                $path = public_path(). '/uploads/profile_pic/';
                $filename1 = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename1);

                $vendorDetails->profile_pic = $filename1;
            }
            if($request->has('banner_pic')){
                $image = $request->banner_pic;
                $path = public_path(). '/uploads/banner_pic/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $vendorDetails->banner_pic = $filename;
            }
            $vendorDetails->save();
        }

        return redirect(url('admin/vendors'))->withErrors(['User updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        $id->delete();

        return redirect(url('admin/vendors'))->with('success','User deleted successfully');
    }
}
