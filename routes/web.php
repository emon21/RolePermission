<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('test', function () {
    return view('backend.pages.auth.login');
});

// Route::get('dashboard',function(){
//     return view('backend.pages.dashboard');
// });

#logout
// Route::middleware(['auth' => 'verified'])->get('/logout', [ProfileController::class, 'logout'])->name('logout');

Route::middleware(['auth' => 'verified'])->group(function () {
    Route::get('user-logout', [UserController::class, 'logout'])->name('user-logout');
    # All Roles Route
    // Route::resource('role',RoleController::class);

    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');

    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');

    Route::get('roles/show/{role}', [RoleController::class, 'show'])->name('roles.show');

    Route::get('roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/update/{role}', [RoleController::class, 'update'])->name('roles.update');

    Route::delete('roles/delete/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    # Permission Route List

    # User Route List
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('users/create', [UserController::class, 'create'])->name('users.create');

    // Route::post('users/store', [UserController::class, 'store'])->name('users.store');

    // Route::get('users/show/{user}', [UserController::class, 'show'])->name('users.show');
    // Route::get('users/edit/{user}', [UserController::class, 'show'])->name('user.show');

    // Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('users/update/{user}', [UserController::class, 'update'])->name('users.update');




});


require __DIR__ . '/auth.php';
