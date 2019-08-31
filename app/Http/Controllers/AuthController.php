<?php

namespace App\Http\Controllers;

use App\JsonReturn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Companies;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->user = new User;
        $this->companies = new Companies();
    }

    public function check(){
        return response()->json([
            'response' => 'Not Authorized',
        ]);
    }

    public function userLogin(Request $request){

        config(['auth.defaults.guard' => 'users']);

        Config::set('jwt.user', 'App\User');
        Config::set('auth.providers.users.model', \App\User::class);

        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                $response = [
                    'response' => 'error',
                    'errorType'=> 'InvalidCredentials',
                    'message' => 'Incorrect email or password',
                ];
                return JsonReturn::error($response);
            }
        } catch (JWTAuthException $e) {
            $response = [
                'response' => 'error',
                'errorType'=> 'JWTTokenError',
                'message' => 'Token cannot be created',
            ];
            return JsonReturn::error($response);
        }

        $logged = User::where('email', '=', $request->email)->first();

        $response = [
            'token' => $token,
            'logged-user-info' => $logged,
            'message' => 'Logged in via user account',
        ];

        return JsonReturn::success($response);
    }

    public function companiesLogin(Request $request){

        config(['auth.defaults.guard' => 'companies']);

        Config::set('jwt.user', 'App\Companies');
        Config::set('auth.providers.users.model', \App\Companies::class);

        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                $response = [
                    'response' => 'error',
                    'errorType'=> 'InvalidCredentials',
                    'message' => 'Incorrect email or password',
                ];
                return JsonReturn::error($response);
            }
        } catch (JWTAuthException $e) {
            $response = [
                'response' => 'error',
                'errorType'=> 'JWTTokenError',
                'message' => 'Token cannot be created',
            ];
            return JsonReturn::error($response);
        }

        $logged = Companies::where('email', '=', $request->email)->first();

        $response = [
            'token' => $token,
            'logged-user-info' => $logged,
            'message' => 'Logged in via companies account',
        ];

        return JsonReturn::success($response);
    }
}
