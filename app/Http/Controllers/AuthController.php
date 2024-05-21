<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class AuthController extends Controller
{
    use HttpResponses; // this is my trait
    use HasRolesAndPermissions;

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
        // $user->attachRole('parent');//👇 sync is better than this!!
        // $user->roles()->sync([6, 5, 4, 3, 2, 1]);
        $detailed_roles = $user->roles()->get();
        $roles = $user->getRoles();
        // $permissions = $user->allPermissions();
        return response()->json([
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken,
            'user' => $user,
            'roles' => $roles,
            'detailed roles' => $detailed_roles,
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
