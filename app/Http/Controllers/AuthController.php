<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use HttpResponses; // this is my trait

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([

            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,

            'password' => Hash::make($request->password),

        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken,
        ]);
    }

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['first_name', 'middle_name', 'last_name', 'password']))) {
            return $this->error('', 'الاسم الثلاثي أو كلمة السر غير صحيحة', 401);
        }

        $user = User::where('first_name', $request->first_name)
            ->where('middle_name', $request->middle_name)
            ->where('last_name', $request->last_name)->first();
        $roles = $user->roles;
        // $permissions = $user->allPermissions();
        return response()->json([
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken,
            'user' => $user,
            'roles' => $roles,
            // 'permissions' => $permissions,
        ], '200');
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'تم تسجيل خروجك بنجاح من التطبيق',
        ]);
    }
}
