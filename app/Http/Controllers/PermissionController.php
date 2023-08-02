<?php

namespace App\Http\Controllers;
use App\Models\Permission;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        $permissions = permission::orderBy('created_at', 'asc')
            ->paginate(7);
        return view('permissions.index', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
            // Add more validation rules as needed
        ]);

        Permission::create($request->all());

        return redirect()->route('permssions.index')->with('success', 'Permission created successfully.');
    }

     public function edit($id)
    {
        $permission = permission::findOrFail($id);
        return view('permissions.edit_permission', compact('permission'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
        'name' => 'required',       
    ]);

    $permission = Permission::findOrFail($id);
    $permission->update([
        'name' => $request->name,
    ]);

    return redirect()->route('permssions.index')->with('success', 'Permission updated successfully.');
    }

    public function delete($id)
    {
       $permission = permission::findOrFail($id);
       $permission->delete();
        return redirect()->route('permssions.index')->with('success', 'Permission delted successfully.');
    }

}
