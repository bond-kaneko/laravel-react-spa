<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth;
use App\User;
use JWTAuth;

/**
 * curl Samples
 * ユーザー登録: curl -X POST -d '{"email":"test@example.com", "name":"test-user","password":"password"}' -H "Content-Type: application/json" http://laravel-react.laravel/api/auth/register
 * ログイン: curl -X POST -d '{"email":"test@example.com", "name":"test-user","password":"password"}' -H "Content-Type: application/json" http://laravel-react.laravel/api/auth/login
 * その他のページへのアクセス: curl  -H "Authorization: Bearer <トークン>"  http://laravel-react.laravel/api/auth/post
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('api', ['except' => ['login']]);
    }

    public function register(Request $request){
        $user = new User;
        $user->fill($request->all());
        $user->password=bcrypt($request->password);
        $user->save();
        return $this->publishToken($request);
    }

    public function login(Request $request){
        return $this->publishToken($request);
    }

    protected function publishToken($request) {
        $token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password]);
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ]);
    }
}