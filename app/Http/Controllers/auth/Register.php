<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'name'          => 'required',
                'email'         => 'required|email',
                'password'      => 'required',
                'role'          => 'required',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'role' => request('role'),
                'password' => request('password'),
            ]);
            return $this->generateResponse($user, "Sucessfully register", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
