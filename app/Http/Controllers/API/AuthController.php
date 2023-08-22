<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login', 'register']);
    }

    public function register(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:32',
            'email_username' => 'required',
            'email_password' => 'required|min:4|max:32',
            'email_provider' => 'required'
        ]);

        if ($validate->passes()) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'email_username' => $request->email_username,
                'email_password' => $request->email_password,
                'email_provider' => $request->email_provider
            ]);

            return response()->json(['message' => 'User registered successfully']);
        } else {
            return response()->json($validate->messages(),400);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $user = User::where('email', $credentials['email'])->first();
        if (!$token = auth('api')->attempt($credentials)){
            return response()->json(['error'=> 'Unauthorized'], 401);
        }
        return response()->json($token);
    }

    public function user()
    {
        return response()->json(auth('api')->user());
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'type' => 'Bearer',
            'expires_in' => \Config::get('jwt.ttl') * 60
        ]);
    }
}

