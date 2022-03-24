<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $user = User::where('email', $request['email'])->firstOrFail();
        if(!Hash::check($request->input('password'),$user->password))
        {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
