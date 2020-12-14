@extends('admin.layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h3>Edit User</h3>
        </div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{$error}}
            </div>

        @endforeach

        <form action="{{route('admin.users.update',$user->id)}}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" name="fname" placeholder="First Name" value="{{$user->fname}}">
                @error('fname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="lname" placeholder="Last Name" value="{{$user->lname}}">
                @error('lname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="address" class="form-control">{{$user->address}}</textarea>
                @error('address')
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