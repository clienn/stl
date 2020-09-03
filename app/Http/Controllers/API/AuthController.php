<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        // return $request;
        $login_data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (!auth()->attempt($login_data)) {
            return response(['message' => 'Invalid credentials', 'status' => false]);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        $userId = Auth::id();

        return response(['user_id' => $userId, 'access_token' => $accessToken, 'status' => true]);
    }
}
