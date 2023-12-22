<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginWithGooglecontroller extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {
                $finduser->update(['google_id' => $user->id]);

                session(['user' => $finduser]);
                session(['user_id' => $finduser->id]);
                session(['user_role' => $finduser->users_role_id]);
                Auth::login($finduser);

                return redirect()->route('index');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'users_role_id' => "BfiwyVUDrXOpmStr",
                    'password' => 0,
                ]);

                session(['user' => $newUser]);
                session(['user_id' => $newUser->id]);
                session(['user_role' => $newUser->users_role_id]);
                Auth::login($newUser);

                return redirect()->route('index');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
