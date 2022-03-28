<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function Logout(Request $request)
    {
        Auth()->guard('web')->logout();
        $request->session()->flush();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
}
