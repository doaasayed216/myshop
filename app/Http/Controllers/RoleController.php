<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::filter(request(['search']))->get()
        ]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        Role::create($request->validate(['name' => 'required|unique:role,name']));
        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->validate(['name' => 'required']));
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
