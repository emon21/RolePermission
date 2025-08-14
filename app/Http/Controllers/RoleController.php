<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // $permissions = Permission::all();
        // $permission_group = $permissions->groupBy('group_name')->all();
        $permission_group = User::getpermissionGroup();


        // $permission_group = Permission::select('group_name')->groupBy('group_name')->get();
        //all group
        // echo $permission_group."</br>";

        //    $permissions = Permission::where('group_name', $permission_group->group_name)->get();

        // return $permissions;

        //group name and permission

        // Group name
        // foreach ($permission_group as  $group) {
        //     # code...
        //     echo $group->group_name."</br>";

        //     // echo "\n===================\n";
        //     // echo "</br>";

        //     // group wise permission
        //     $permission = Permission::where('group_name', $group->group_name)->get();
        //     foreach ($permission as $value) {
        //         echo "--".$value->name . "</br>";

        //     }
        // }



        //group wise permission

        //    echo "Group Name :" .$permission_group."\n"." Permission :".$permission = Permission::select('name')->get();

        // foreach ($permissions as $value) {
        //     echo $value->name . "</br>";
        // }





        // return $permission_group->groupBy('group_name')->all();


        #=========================



        //    return $permission_group;

        // foreach loop on permission
        //    $permission_group = Permission::select('group_name')->groupBy('group_name')->get();

        //   foreach ($permission_group as  $group) {

        //     //     echo $permission_group[$key]['group_name'] = $value['group_name'];
        //     //     echo "\n";
        //     //     // permission
        //     //  echo   $permission_group[$key]['permissions'] = Permission::where('group_name', $value['group_name'])->get();

        //      # =================
        //         // All group name
        //      echo $group->group_name."</br>";

        //      $permission = Permission::where('group_name', $group->group_name)->get();

        //      foreach ($permission as $key => $value) {
        //         echo $value->name."</br>";
        //      }

        // group wise permission
        //  foreach ($permission_group as $permission) {
        //     echo $permission->name."</br>";

        //  }



        //    $permission_group[$group->group_name]['permissions'] = Permission::where('group_name', $group->group_name)->get();


        //  $permission_group[$group->group_name]['permissions'] = Permission::where('group_name', $group->group_name)->get();





        return view('backend.pages.roles.create', [
            //'permissions' => $permissions,
            'permission_group' => $permission_group
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Role $role)
    {
        //validation
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permission' => 'required|array|min:1'
        ]);


        $role->name = $request->input('name');
        $permissionID = array_map('intval', $request->input('permission'));
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
        $permission_group = User::getpermissionGroup();


        # Role wise Permission
        // $role = Role::with('Permissions')->find($role->id);
        $role = Role::with('Permissions')->find($role->id);

        // return $rolePermission = $role->Permissions->pluck('id')->toArray();

        # Permission  id array data show
        $rolePermission = $role->Permissions->pluck('id')->all();

        return view('backend.pages.roles.edit', compact('role', 'permissions', 'rolePermission', 'permission_group'));


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
