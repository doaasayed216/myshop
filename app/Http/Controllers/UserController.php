<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Rules\Valid;
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
            'users' => User::filter(request(['search', 'role']))->paginate(20),
            'currentRole' => Role::firstWhere('name', request('role')),
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    public function store(Request $request)
    {
        $attributes =  array_merge($this->validateUser($request), [
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        User::create($attributes);
        return back();
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($this->validateUser($request, $user));
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    protected function validateUser(Request $request, ?User $user = null)
    {
        $user ?? new User;
        return $request->validate([
            'name' => ['required'],
            'email' => ['required', $user ? 'exists:users,email' : 'unique:users,email', new Valid],
            'role_id' => ['numeric', 'exists:roles,id']
        ]);
    }
}
