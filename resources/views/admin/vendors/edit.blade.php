@extends('admin.layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h3>Edit Vendor</h3>
        </div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{$error}}
            </div>

        @endforeach

        <form action="{{route('admin.vendors.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control" name="fname" placeholder="First Name" value="{{$user->fname}}" required>
                @error('fname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="lname" placeholder="Last Name" value="{{$user->lname}}" required>
                @error('lname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="email" placeholder="Email" value="{{$user->email}}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="address" class="form-control" required>{{$user->address}}</textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="store_name" class="form-control" placeholder="Store Name" value="{{$user->vendorDetails->store_name}}" required>
                @error('store_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="store_address" class="form-control" placeholder="Store Address" required>{{$user->vendorDetails->store_address}}</textarea>
                @error('store_address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="store_description" class="form-control" placeholder="Store Description" required>{{$user->vendorDetails->store_description}}</textarea>
                @error('store_description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="contact_number" type="number" class="form-control" placeholder="Contact Number" value="{{$user->vendorDetails->contact_number}}" required>
                @error('contact_number')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="profile_pic" type="file" class="form-control">
                <img src="{{url('uploads/profile_pic/'.$user->vendorDetails->profile_pic)}}" width="100px">
                @error('profile_pic')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="banner_pic" type="file" class="form-control">
                <img src="{{url('uploads/banner_pic/'.$user->vendorDetails->banner_pic)}}" width="100px">
                @error('banner_pic')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="phone_number" type="number" class="form-control" placeholder="Phone Number" value="{{$user->vendorDetails->phone_no}}" required>
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a type="button" href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
        </form>


    </div>
@stop