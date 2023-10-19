<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function v1(Request $request)
    {
        try {
            // set validation rule
            $rules = [
                'email'    => 'required|email',
                'password' => 'required',
            ];
            // validate payload
            $validation = $request->validate($rules);
            $user = User::where('email', request('email'))->first();
            if (!$user) {
                return $this->generateResponse('', 'Login failed: email not registered!', 422);
            }

            $token = Auth::attempt($validation);

            // if attempt fail
            if (!$token) {
                return $this->generateResponse('', 'Login failed: wrong username or password!', 422);
            }

            $response = [
                'user'  => $user,
                'token' => Auth::user()->createToken('authToken')->accessToken,
            ];

            return $this->generateResponse($response, 'Login successfully', 200);
        } catch (\Exception $th) {
            return $this->generateResponse($th, "Internal server error", 500);
        }
    }
}
