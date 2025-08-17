<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    public function profile(Request $request, User $user)
    {

        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $request->user()->id)->first();

        // return view("backend.pages.auth.profile",['user' =>$user]);
        return view("backend.pages.auth.profile", [
            'user' => $user,
            'userProfile' => $userProfile
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information. ProfileUpdateRequest RedirectResponse
     */
    public function update(Request $request)
    {
        // $request->user()->fill($request->validated());

        // return $request->all();
        // $userProfile = UserProfile::where('user_id', $request->user()->id)->first();
        // $userProfile->update($request->all());

        if ($request->name) {
            $request->user()->name = $request->name;
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user = Auth::user();


        # User Profile Setting Update

        $userProfile = UserProfile::where('user_id', $user->id)->first();
        // $userProfile = UserProfile::all();
        // $userProfile = new UserProfile();
    
        $userProfile->user_id = $user->id;
        $userProfile->website = $request->website;
        $userProfile->github_url = $request->github_url;
        $userProfile->facebook_url = $request->facebook_url;
        $userProfile->twitter_url = $request->twitter_url;
        $userProfile->linkedin_url = $request->linkedin_url;
        $userProfile->instagram_url = $request->instagram_url;

        

        // # User Profile Update

        if ($request->file('picture')) {

            #img upload and old img delete
            if (File::exists($user->profile_Photo)) {
                File::delete($user->profile_Photo);
            }

            # Image upload
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $url = $file->move(public_path('uploads/car'), $filename);
            $url = $file->move('uploads/profile/', $filename);
            $request->user()->profile_Photo = $url;
            $request->user()->save();
        }

        // return Redirect::route('profile')->with('success', 'Image uploaded successfully!')
        //     ->with('image', $filename);

        $userProfile->save();

        return Redirect::route('profile')->with('success', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
