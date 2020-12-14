@extends('users.layouts.default')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Welcome {{auth()->user()->fname}}!</h1>
    </div>
@stop