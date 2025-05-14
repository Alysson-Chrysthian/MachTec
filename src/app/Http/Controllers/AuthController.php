<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('company.home');
    }

}
