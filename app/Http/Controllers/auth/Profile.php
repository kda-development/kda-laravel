<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;

class Profile extends Controller
{
    public function v1()
    {
        $user = auth()->user();
        return $this->generateResponse($user, "Sucessfully get profile", 200);
    }
}
