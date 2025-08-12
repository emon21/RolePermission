<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::with('roles')->get();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->assignRole($request->roles);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        $userRole = $user->roles->pluck('name')->all();

        return view('backend.pages.users.edit', compact('roles', 'user', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password')) {

            // $user->update([
            //     'password' =>Hash::make($request->password)
            // ]);

            $user->password = Hash::make($request->password);
            $user->save();
        }
        // $user->password = $request->password;
        $user->syncRoles($request->roles); //old role delete after role update
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    # Logout Method

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
