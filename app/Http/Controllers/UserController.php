<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('admin.users.index', [
            'users' => User::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $attributes =  $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'isAdmin' => ['required']
        ]);

        $user = User::create($attributes);

        if($request->get('isAdmin') == 1)
        {
            $user->isAdmin = true;
        }

        $user->save();
        return back();
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'isAdmin' => ['required']
        ]);

        $user->update($attributes);

        if(request()->get('isAdmin') == 1)
        {
           $user->isAdmin = true;
           $user->save();
        }


        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
