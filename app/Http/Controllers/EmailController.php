<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('verify-email');
    }

    public function send(EmailVerificationRequest $request)
    {
        $request->fulfill();
        auth()->logout();
        return redirect()->route('login');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
