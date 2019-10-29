<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected function guard()
    {
        return Auth::guard();
    }
    public function login(Request $request)
    {
        Validator::make($request->all(), [
            'username' => 'required|exists:users,username,active,1',
            'password' => 'required'
        ], [
            'username.required' => 'Username Harus di Isi',
            'username.exists' => 'Username Anda Sudah di Nonaktifkan Silahkan Hubungi Super Admin'
        ])->validate();

        $auth = $request->except(['remember_me']);
        if (auth()->attempt($auth, $request->remember_me)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('AppName')->accessToken;

            return response()->json(['status' => 'success', 'data' => $success['token']], 200);
        } else {
            return response()->json(['status' => 'Username / Password Salah']);
        }
    }
}
