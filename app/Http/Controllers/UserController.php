<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
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
        $this->authorize('viewAny', User::class);
        return view('admin.users.index', [
            'users' => User::filter(request(['search', 'role']))->paginate(20),
            'currentRole' => Role::firstWhere('name', request('role')),
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $attributes =  $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $user = User::create($attributes);

        if($request->role_id) {
            $user->role_id = $request->input('role_id');
        }

        $user->save();
        return back();
    }

    public function edit(User $user)
    {
        $this->authorize('update', User::class);
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', User::class);
        $attributes = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
        ]);

        $user->update($attributes);

        if($request->role_id) {
            $user->role_id = $request->input('role_id');
        }

        $user->save();
        return back();
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);
        $user->delete();
        return back();
    }
}
