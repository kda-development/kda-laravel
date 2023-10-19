<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Logout extends Controller
{
    public function v1(Request $request)
    {
        try {
            $token = request()->user()->token();
            $token->revoke();
            return $this->generateResponse(null, "Sucessfully logout", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
