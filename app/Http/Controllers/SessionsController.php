<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

        $credenials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($credenials, $request->remember))
        {
            session()->regenerate();
            if(auth()->user()->isAdmin)
                return redirect('/admin');
            return redirect('/');
        }

        throw ValidationException::withMessages(['email' => 'Invalid email or password']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
