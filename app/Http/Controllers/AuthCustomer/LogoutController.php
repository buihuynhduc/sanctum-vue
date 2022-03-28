<?php

namespace App\Http\Controllers\AuthCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function Logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
}
