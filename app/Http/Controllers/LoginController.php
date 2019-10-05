<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            return response()->json(['status' => 'success', 'data' => Str::random(40)], 200);
        } else {
            return response()->json(['status' => 'Email / Password Salah']);
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
    }
}
