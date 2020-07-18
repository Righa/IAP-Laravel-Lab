<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    /**
     * Authenticate user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
    	$cooked = $request->validate([
    		'email' => 'email|required',
    		'password' => 'required'
    	]);

    	if (!auth()->attempt($cooked)) {
    		return response([
    			'success' => false,
    			'message' => 'invalid credentials'
    		]);
    	}

    	$accessToken = auth()->user()->createToken('authToken')->accessToken;

    	return response(['success' => true, 'access_token' => $accessToken, 'user' => auth()->user()]);
    }

    /**
     * Register user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response or
     * @return \Illuminate\Http\Api\AuthController@login
     */
    public function register(Request $request)
    {
    	$cooked = $request->validate([
    		'name' => 'required|max:55',
    		'email' => 'email|required|unique:users',
    		'password' => 'required'
    	]);
    	$cooked['password'] = bcrypt($request->password);

    	$user = User::create($cooked);

    	$accessToken = $user->createToken('authToken')->accessToken;

    	return response(['success' =>true, 'access_token' => $accessToken, 'user '=> $user]);
    }

    /**
     * Deauthenticate user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
    	$cooked = $request->validate([
    		'token' => 'required'
    	]);

    	$tokenRepository = app('Laravel\Passport\TokenRepository');
    	$tokenRepository->revokeAccessToken($request->token);
    	return response(['success' =>true, 'message' => 'you have been logged out']);
    }
}
