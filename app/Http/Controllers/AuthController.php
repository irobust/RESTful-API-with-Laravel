<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public  function  register(Request  $request)
    {
        // Input Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 400);
        }
 
        // insert new user to database
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        ]);
 
        // Login after created user
        $token = auth()->login($user);
        return  response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60
            ], 201);
    }

    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        
        // input validation

        if(!$token = auth()->attempt($credentials)){
            return response()->json([
                'err' => 'Invalid username or password'
            ], 400);
        }
        return response()->json([
            'token' => $token
        ], 200);
    }

    public  function  logout(Request  $request){
        auth()->logout(true); // Force token to blacklist
        return  response()->json([
                    'success' => 'Logged out Successfully.'
                ], 200);
    }
}
