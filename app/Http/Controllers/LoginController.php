<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        $auth = $request->except(['remember_me']);
        if (auth()->attempt($auth, $request->remember_me)) {

            return response()->json(['status' => 'success', 'data' => Str::random(40)], 200);
        }
        return response()->json(['status' => 'failed']);
    }
}
