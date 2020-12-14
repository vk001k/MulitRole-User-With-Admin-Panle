@extends('admin.layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h3>Add Vendor</h3>
        </div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{$error}}
            </div>

        @endforeach

        <form action="{{route('admin.vendors.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control" name="fname" placeholder="First Name" value="{{old('fname')}}" required>
                @error('fname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="lname" placeholder="Last Name" value="{{old('lname')}}" required>
                @error('lname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="store_name" class="form-control" placeholder="Store Name" value="{{old('store_name')}}" required>
                @error('store_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="store_address" class="form-control" placeholder="Store Address" required>{{old('store_address')}}</textarea>
                @error('store_address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="store_description" class="form-control" placeholder="Store Description" required>{{old('store_description')}}</textarea>
                @error('store_description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="contact_number" type="number" class="form-control" placeholder="Contact Number" value="{{old('contact_number')}}" required>
                @error('contact_number')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="profile_pic" type="file" class="form-control" required>
                @error('profile_pic')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="banner_pic" type="file" class="form-control" required>
                @error('banner_pic')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="phone_number" type="number" class="form-control" placeholder="Phone Number" value="{{old('phone_number')}} required">
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="button" href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
        </form>


    </div>
@stop