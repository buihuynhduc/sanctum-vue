<?php

namespace App\Http\Controllers\AuthCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        if(!Auth::guard('customer')->attempt($credentials))
        {
            return response()->json([
                'error'=>'Invalid login details'
            ]);
        }
        else
        {
            $customer = Auth::guard('customer')->user();
        }
        $token = $customer->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'status'=>Auth::guard('customer')->check()
        ]);
    }
}
