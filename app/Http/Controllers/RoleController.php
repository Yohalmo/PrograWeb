<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderby('name')->paginate(20)->withPath(route('admin.buscar-roles'));
        return view('role.index', compact('roles'));

    }

    public function Buscar($palabra = ''){
        $roles = Role::where('name', 'like', "%$palabra%")->paginate(20)->withPath(route('admin.buscar-roles', [$palabra]));
        return view('role.data', compact('roles'));
    }

    public function create()
    {
        return view('role.create', [
            'row' => new Role(),
            'permissions' => Permission::all(),
        ]);

    }

    public function store(Request $request)
    {
        $row = new Role(array(
            "name"          => $request->name,
            "guard_name"    => "web"
        ));

        $row->save();

        $row->permissions()->sync($request->permission);

        return redirect()->route('role.show', $row->id);

    }

    public function show(Role $role)
    {
        return view('role.show', [
            'row' => $role->load('permissions')
        ]);

    }

    public function edit(Role $role)
    {
        return view('role.edit', [
            'row' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        $role->permissions()->sync($request->permission);

        return redirect()->route('role.show', $role->id);
    }

}
