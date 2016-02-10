<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;
use Auth;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    
	/**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return response()->json([
                "token" => JWT::encode([
                    "email"=>$request->input('email'),
                    "pass" => $request->input('password')
                ],
                Config::get('services.jwt.secret'))
            ]);
        }
        else {
            return response()->json([
                "message" => "Invalid credentials"
            ], 401);
        }
    }

}
