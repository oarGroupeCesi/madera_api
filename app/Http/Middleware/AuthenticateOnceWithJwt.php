<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Auth;
use Firebase\JWT\JWT;
use \Exception;

class AuthenticateOnceWithJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = trim(str_replace("Bearer", "", $request->header('authorization')));

        try {
            $user = JWT::decode($token, Config::get('services.jwt.secret'), array('HS256'));
            if (Auth::attempt(['email' => $user->email, 'password' => $user->pass])) {
                return $next($request);
            }
            else {
                return response('Unauthorized.', 401);
            }
        } catch (Exception $e) {
            return response()->json([
                "message" => "Token invalid"
            ], 401);
        }
    }
}
