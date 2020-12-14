<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorDetails extends Model
{
    protected $table = 'vendor_details';
    protected $fillable = ['user_id','store_name','store_address','store_description','contact_number','profile_pic','banner_pic','phone_no'];
}
