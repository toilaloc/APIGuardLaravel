<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class APIController extends Controller

{
    public $loginAfterSignUp = true;

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'status' => true,
            'token' => $token,
        ]);
    }

//    public function logout(Request $request)
//    {
//        $this->validate($request, [
//            'token' => 'required'
//        ]);
//
//        try {
//            JWTAuth::invalidate($request->token);
//
//            return response()->json([
//                'status' => true,
//                'message' => 'User logged out successfully'
//            ]);
//        } catch (JWTException $exception) {
//            return response()->json([
//                'status' => false,
//                'message' => 'Sorry, the user cannot be logged out'
//            ], 500);
//        }
//    }
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    public function register(StoreUserRequest $request) {
        $validator = $request->validated();
        $validator['password'] = Hash::make($request->password);

        $user = User::create($validator);
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


}
