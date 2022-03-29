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
        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
        }
        else
        {
            if(Auth::guard('customer')->attempt($credentials))
            {
                $user = Auth::guard('customer')->user();
            }
            else
            {
                return response()->json([
                    'error'=>'Invalid login details'
                ]);
            }
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
