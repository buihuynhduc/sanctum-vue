<?php

namespace App\Http\Controllers\AuthCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'required|min:4'
        ]);
        $customer = Customer::create([
            'name'=>$validate['name'],
            'password'=>Hash::make($validate['password']),
        ]);
        $token = $customer->createToken('auth')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
