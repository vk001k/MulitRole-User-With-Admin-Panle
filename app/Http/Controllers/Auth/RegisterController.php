<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\NotifyAdmin;
use App\Providers\RouteServiceProvider;
use App\User;
use App\VendorDetails;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PharIo\Version\Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
        protected function create(array $data)
    {
       $user = User::create([
            'role_id' => $data['user_type'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'address' => $data['address'],
            'reg_by'=>'Web',
            'google_id'=>'',
            'facebook_id'=>'',
            'password' => Hash::make($data['password']),
        ]);

        //vendor details

        if($data['user_type'] == 2){
            $vendorDetails =new VendorDetails();
            $vendorDetails->user_id = $user->id;
            $vendorDetails->store_name = $data['store_name'];
            $vendorDetails->store_address = $data['store_address'];
            $vendorDetails->store_description = $data['store_description'];
            $vendorDetails->contact_number = $data['contact_number'];
            $vendorDetails->phone_no =  $data['phone_no'];
            $vendorDetails->contact_number = $data['contact_number'];

            if($data['profile_pic'] !=null){
                $image = $data['profile_pic'];
                $path = public_path(). '/uploads/profile_pic/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $vendorDetails->profile_pic = $path;
            }else{
                $vendorDetails->profile_pic = '';
            }
            if($data['banner_pic'] !=null){
                $image = $data['banner_pic'];
                $path = public_path(). '/uploads/banner_pic/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $vendorDetails->banner_pic = $path;
            }else{
                $vendorDetails->banner_pic = '';
            }

            $vendorDetails->save();
        }

        //notify admin
        $admin = User::where('role_id',3)->first();
        $admin->notify(new NotifyAdmin($user));
        return $user;
    }
}
