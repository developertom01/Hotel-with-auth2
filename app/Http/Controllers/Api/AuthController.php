<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validated= $request->validate(
            [
                'name'=>'required|max:55',
                'email' => 'email|required|unique:users',
                'password' => 'required|confirmed',
            ]
            );

        $validated['password'] = bcrypt($request->password);
            $user= User::create($validated);
           $accessToken= $user->createToken('authToken')->accessToken;

           return response([
               'user'=>$user,
               'access_token'=>$accessToken
           ]);
    }

    public function login(Request $request ){
        $validated= $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($validated)){
            return response([
                'message'=>'invalid credebtials'
            ]);

        }

        $accessToken =  auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(),'access_token'=>$accessToken]);
    }
}
