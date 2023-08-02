<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\RoleHasPermission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::orderBy('created_at', 'asc')
            ->paginate(7);
        return view('roles.index', compact('roles'));
    }
     public function create()
    {
        $permissions = Permission::all();
        return view('roles.add_role', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
        ]);
        $role = Role::create([
            'name' => $request->input('name')
        ]);

        $permissionIds = $request->input('permissions', []);
        $role->permissions()->attach($permissionIds);

        return redirect()->route('roles.create')->with('success', 'Role created successfully.');
    }
     public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit_role', compact('role','permissions'));
    }
     public function update(Request $request, $id)
    {
       
         $request->validate([
             'name' => 'required',       
        ]); 
       $role = Role::findOrFail($id);
       $role->permissions()->detach();
       $permissions = $request->input('permissions', []);
       foreach ($permissions as $permissionId) {
           $role->permissions()->attach($permissionId);
       }
        $role->update([
        'name' => $request->name,
        ]);

       return redirect()->route('roles.index')->with('success', 'Roles updated successfully.');
    }
     public function delete($id)
    {
       $roles = Role::findOrFail($id);
       $roles->delete();
        return redirect()->route('roles.index')->with('success', 'roles delted successfully.');
    }
}
