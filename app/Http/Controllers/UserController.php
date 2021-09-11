<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function createRegister()
    {
        return view('register');

    }

    public function createLogin()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $attributes =  $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('verification.notice');
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
