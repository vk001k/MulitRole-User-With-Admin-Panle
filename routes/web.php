<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/{social}', 'SocialController@socialLogin');
Route::get('login/{social}/callback', 'SocialController@handleSocialLoginCallback');
Route::group(['as'=>'vendors.','prefix'=>'vendors','middleware' => ['auth','vendors']],function(){
    Route::get('/dashboard','VendorsController@index');
    Route::get('/edit/{id}','VendorsController@edit');
    Route::post('/update/{id}','VendorsController@update');
});
Route::group(['as'=>'users.','prefix'=>'users','middleware' => ['auth','user']],function(){
    Route::get('/dashboard','UsersController@index');
    Route::get('/edit/{id}','UsersController@edit');
    Route::post('/update/{id}','UsersController@update');
});
//admin routes
Route::get('admin/login',function(){
    if(auth()->check()){
        if(auth()->user()->role_id == 3){
            return redirect(url('admin/dashboard'));
        }
    }else{
        return view('admin.login');
    }
});
Route::post('admin/logout',function(){
    \Illuminate\Support\Facades\Auth::logout();
    return view('admin.login');
});
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['auth','admin']], function () {
    Route::post('login','UsersController@loginProcess');
    Route::get('edit-profile/{id}','DashboardController@edit');
    Route::post('update/{id}','DashboardController@update');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('users','UsersController');
    Route::post('users/update/{id}','UsersController@update')->name('users.update');
    Route::get('users/destroy/{id}','UsersController@destroy')->name('users.destroy');
    Route::resource('vendors','VendorController');
    Route::post('vendors/update/{id}','VendorController@update')->name('vendors.update');
    Route::get('vendors/destroy/{id}','VendorController@destroy')->name('vendors.destroy');
});

