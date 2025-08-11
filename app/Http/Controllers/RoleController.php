<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::with('Permissions')->latest()->get();

        return view('backend.pages.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::latest()->get();
        return view('backend.pages.roles.create',['permissions' =>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Role $role)
    {
        //validation

        // $request->validate([
        //     'name' => 'required|string|unique:roles,name'
        // 'permission' => 'required|array|min:1'
        // ]);


        $permissionID = array_map('intval',$request->permission);

        $role->name = $request->input('name');
        $role->syncPermissions($permissionID);
        $role->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

       # All Permission
        $permissions = Permission::all();

        # Role wise Permission
        // $role = Role::with('Permissions')->find($role->id);
         $role = Role::with('Permissions')->find($role->id);

        // return $rolePermission = $role->Permissions->pluck('id')->toArray();

        # Permission  id array data show
         $rolePermission = $role->Permissions->pluck('id')->all();

         return view('backend.pages.roles.edit',compact('role', 'permissions','rolePermission'));


        // return view('backend.pages.roles.edit', [
        //     'role' => $role,
        //     'permissions' => $permissions
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //  $id = $request->id;

        // Role::whereId($id)->update([
        //     'name' => $request->input('name')
        // ]);
       

        $role->name = $request->input('name');
        $role->save();

         $permissionID = array_map('intval', $request->input('permission'));
        $role->syncPermissions($permissionID);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('roles.index');

    }
}
