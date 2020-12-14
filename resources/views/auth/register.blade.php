@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                                <div class="col-md-6">
                              <select class="form-control" name="user_type" id="user_type" required>
                                  <option value="">Select User Type</option>
                                  <option value="1" @if(old('user_type') == 1) selected @endif>User</option>
                                  <option value="2" @if(old('user_type') == 2) selected @endif>Vendor</option>
                              </select>

                                @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="name" autofocus>

                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="name" autofocus>
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="vendor_div" style="display: none;">
                                <div class="form-group row">
                                    <label for="store_name" class="col-md-4 col-form-label text-md-right">{{ __('Store Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="store_name" type="text" class="form-control vendor_validate" name="store_name" >
                                        @error('store_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="store_address" class="col-md-4 col-form-label text-md-right">{{ __('Store Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="store_address" type="text" class="form-control vendor_validate" name="store_address" >
                                        @error('store_address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="store_description" class="col-md-4 col-form-label text-md-right">{{ __('Store Description') }}</label>

                                    <div class="col-md-6">
                                        <input id="store_description" type="text" class="form-control vendor_validate" name="store_description" >
                                        @error('store_description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="contact_number" type="number"   placeholder="enter 10 digit contact number" class="form-control vendor_validate" name="contact_number" >
                                        @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profile_pic" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                                    <div class="col-md-6">
                                        <input id="profile_pic" type="file" class="form-control vendor_validate" name="profile_pic" >
                                        @error('profile_pic')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="banner_pic" class="col-md-4 col-form-label text-md-right">{{ __('Banner Picture') }}</label>

                                    <div class="col-md-6">
                                        <input id="banner_pic" type="file" class="form-control vendor_validate" name="banner_pic" >
                                        @error('banner_pic')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_no" type="number" class="form-control vendor_validate" name="phone_no" placeholder="enter 10 digit phone number">

                                        @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>--}}
    <script>
        $(document).on('change', '#user_type', function() {
            if($(this).val() == 2){
                $('.vendor_div').show();
                $('.vendor_validate').attr('required',true);
            }else{
                $('.vendor_div').hide();
                $('.vendor_validate').attr('required',false);
            }
            // Does some stuff and logs the event to the console
        });

//        google.maps.event.addDomListener(window, 'load', function () {
//            var places = new google.maps.places.Autocomplete(document.getElementById('address'));
//            google.maps.event.addListener(places, 'place_changed', function () {
//
//            });
//        });
    </script>
@endsection
