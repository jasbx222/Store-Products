<?php

namespace App\Http\Controllers\Admin\v1;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;  

class UserController extends Controller
{

    // تسجيل دخول اليوزر 
// return user info with token 
   public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json('Invalid credentials', 401);
        }

        $user = User::where('email', $validated['email'])->first();

        $tokenName = 'API Token for ' . $user->email;

        $token = $user->createToken($tokenName)->plainTextToken;

        return [
            'user'=> new UserResource($user),
            'token'=>$token
        ];
    }


    
    // logout user 
    // تسجيل الخروج 
//  return Logged out successfully
public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Logged out successfully'
    ]);
}
}

