<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function Register(Request $request)
    {
        $validate = $request->validate([
           'name'=>'required|string|max:255',
           'email'=>'required|string|max:255|email|unique:users',
           'password'=>'required|min:4'
        ]);
        $user= User::create([
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>Hash::make($validate['password']),
        ]);
        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
