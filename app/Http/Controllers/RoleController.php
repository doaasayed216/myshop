<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Role::class);
        return view('admin.roles.index', [
            'roles' => Role::filter(request(['search']))->get()
        ]);
    }

    public function create()
    {
        $this->authorize('create', Role::class);
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Role::class);
        Role::create($this->validateRole($request));
        return back();
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);
        $role->update($this->validateRole($request, $role));
        return back();
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
        return back();
    }

    protected function validateRole(Request $request, ?Role $role = null)
    {
        $role ?? new Role();
        return $request->validate([
            'name' => ['required', Rule::unique('roles', 'name')->ignore($role)]
        ]);
    }
}
