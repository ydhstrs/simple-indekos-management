<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function index()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $current_user = User::where('gauth', $user->id)->first();

            if ($current_user) {
                Auth::login($current_user);

                toastr()->closeButton(true)->addSuccess('Successfully login.');
                return redirect()->route('home.index');
            } else {

                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name'      => $user->name,
                    'gauth'     => $user->id,
                    'password'  => Hash::make(Str::random(25, 'alpha-numeric'))
                ]);

                $newUser->where('email', $user->email)->update(['email_verified_at' => now()]);
                $newUser->assignRole('Member');

                Auth::login($newUser);

                toastr()->closeButton(true)->addSuccess('Successfully login.');
                return redirect()->route('home.index');
            }
        } catch (Exception $e) {
            toastr()->closeButton(true)->addWarning('Something went wrong!');
            return redirect()->route('login');
        }
    }
}
