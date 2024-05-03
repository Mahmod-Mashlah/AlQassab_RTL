<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $user = User::get()
                    ->where('email', $request->email)
                    ->first()
                    ;
        $userID = $user->id ;


        $admin = User::get()
                    ->where('id', 1)
                    ->first()
                    ;
        $adminID = $admin->id ;

        // Attempt to log in the user
        if (auth()->attempt($credentials )) {
            if ( $userID == $adminID) {
                // Authentication successful, redirect to dashboard or desired page
            return redirect('/');
            }
            else {
                return redirect()->route('login',
        // compact('loginFailed',)
        )
        ->withErrors(['notAdmin' => 'Invalid credentials']);
            }

        }

        // Authentication failed, redirect back to login form with error message
    //    $loginFailed=  Alert::success('Login Failed !', 'You must enter correct Username and password ');
        return redirect()->route('login',
        // compact('loginFailed',)
        )
        ->withErrors(['loginFailedMessage' => 'Invalid credentials']);
    }
}
