<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;

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
            'name' => ['required'],
            'password' => ['required'],
        ]);


        $user = User::get()
            ->where('full_name', $request->full_name)
            ->first();
        $userID = $user->id;


        // Attempt to log in the user
        if (auth()->attempt($credentials)) {
            if ($userID) {
                // Authentication successful, redirect to dashboard or desired page
                // return redirect('/');
                return redirect('/years');
            } else {
                return redirect()->route(
                    // 'login',
                    'years',
                    // compact('loginFailed',)
                )
                    ->withErrors(['notAdmin' => 'Invalid credentials']);
            }
        }

        // Authentication failed, redirect back to login form with error message
        //    $loginFailed=  Alert::success('Login Failed !', 'You must enter correct Username and password ');
        return redirect()->route(
            // 'login',
            'years',
            // compact('loginFailed',)
        )
            ->withErrors(['loginFailedMessage' => 'Invalid credentials']);
    }


    protected function credentials(Request $request)
    {
        $credentials = $request->only('first_name', 'middle_name', 'last_name', 'password');
        return $credentials;
    }
    public function login(Request $request)
    {
        $credentials = $this->credentials($request);
        // $credentials = $request->only(['full_name', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('years'));
        }
        return back()->withErrors([
            'first_name' => 'الاسم غير صحيح , حاول مجدداً 😅',
            'middle_name' => 'اسم الأب غير صحيح , حاول مجدداً 😅',
            'last_name' => 'الكنية غير صحيحة , حاول مجدداً 😅',
            'password' => 'كلمة السر غير صحيحة 😅'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
