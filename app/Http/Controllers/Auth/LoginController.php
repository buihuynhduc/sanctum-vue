<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function Login(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'error'=>'Invalid login details'
            ]);
        }
        else
        {
            $user = Auth::user();
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'status'=>Auth::check()
        ]);
    }
}
