<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.refresh')->only('refresh');
        // $this->middleware('auth:api', ['except' => ['login', 'refresh']]);
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

        $credentials = request(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60*60*24*365*10,
            'status' => 'success'
        ]);
    }
    public function guard()
    {
        return Auth::guard();
    }
}
