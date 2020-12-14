<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use PharIo\Version\Exception;

class SocialController extends Controller
{
    public function socialLogin($social)
    {

        return Socialite::driver($social)->redirect();
    }

    public function handleSocialLoginCallback($social)
    {
        try {

            $user = Socialite::driver($social)->user();
            if ($social == 'google') {
                $finduser = User::where('google_id', $user->id)
                    ->orWhere('email', $user->email)->first();
                if ($finduser) {
                    $finduser->update([
                        'google_id' => $user->id
                    ]);
                    Auth::login($finduser);
                    return redirect('/users/dashboard');

                } else {
                    $newUser = User::create([
                        'role_id' => 1,
                        'fname' => $user->name,
                        'lname' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'reg_by' => 'Google',
                        'password' => Hash::make('12345678')
                    ]);
                }

            }

            if ($social == 'facebook') {
                $finduser = User::where('facebook_id', $user->id)
                    ->orWhere('email', $user->email)->first();
                if ($finduser) {
                    $finduser->update([
                        'facebook_id' => $user->id
                    ]);
                    Auth::login($finduser);
                    return redirect('/users/dashboard');

                } else {
                    $newUser = User::create([
                        'role_id' => 1,
                        'fname' => $user->name,
                        'lname' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'reg_by' => 'Facebook',
                        'password' => Hash::make('12345678')
                    ]);
                }


                Auth::login($newUser);

                return redirect('/users/dashboard');
            }
        }
        catch
            (Exception $e) {
                dd($e->getMessage());
            }
    }
}
