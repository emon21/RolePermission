<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = Permission::latest()->get();
        return view('backend.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Permission $permission)
    {
        //
        # Validation
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        $permission->name = Str::slug($request->name);
        $permission->save();
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('backend.pages.permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {

        $permission->name = Str::slug($request->name);
        $permission->save();

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {

        $permission->delete();
        return redirect()->route('permission.index');
    }
}
