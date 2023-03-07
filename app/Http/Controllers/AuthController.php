<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\boolean;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'remember' => 'boolean'
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials,$remember)) {
            return response([
                'message' => 'Email or password is incorrect'
            ], 422);
        }

        $user = Auth::user();
        if (!$user->is_admin) {
            Auth::logout();
            return response([
                'message' => 'You are not an Admin'
            ],403);
        }

//        if (!$user->email_verified_at){
//            Auth::logout();
//            return response([
//                'message' => 'Your email is not verified'
//            ],403);
//        }
        $token = $user->createToken('main')->plainTextToken;
        return response([
            die(var_dump(1)),
            'user' => new UserResource($user),
            'token' => $token

        ]);

    }
}
