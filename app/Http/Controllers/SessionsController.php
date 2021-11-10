<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        if(auth()->attempt($credentials, $request->remember))
        {
            session()->regenerate();
            if(in_array(Auth::user()->role->name, ['Admin', 'Seller']))
                return redirect('/admin');
            return redirect()->intended();
        }

        throw ValidationException::withMessages(['email' => 'Invalid email or password']);
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        return redirect('login');
    }
}
