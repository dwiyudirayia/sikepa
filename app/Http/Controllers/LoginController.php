<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    protected function guard()
    {
        return Auth::guard();
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        $auth = $request->except(['remember_me']);
        if (auth()->attempt($auth, $request->remember_me)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('AppName')->accessToken;

            return response()->json(['status' => 'success', 'data' => $success['token']], 200);
        } else {
            return response()->json(['status' => 'Email / Password Salah']);
        }
    }
}
