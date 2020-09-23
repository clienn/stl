<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        // print_r($credentials);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }
        
        // $hashpassword = Hash::make('admin123');
        // echo $hashpassword . '<br />';

        // if (Hash::check('admin123', $hashpassword)) {
        //     echo 'TRUE';
        // } else {
        //     echo 'FALSE';
        // }
        return redirect()->intended('/');
    }
}
