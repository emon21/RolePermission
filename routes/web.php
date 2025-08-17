<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

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

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('test', function () {
    return view('backend.pages.auth.login');
});

// Route::get('dashboard',function(){
//     return view('backend.pages.dashboard');
// });

#logout
// Route::middleware(['auth' => 'verified'])->get('/logout', [ProfileController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('user-logout', [UserController::class, 'logout'])->name('user-logout');
    # All Roles Route
    // Route::resource('role',RoleController::class);

    Route::get('roles', [RoleController::class, 'index'])
        ->middleware('permission:role-menu')
        ->name('roles.index');

    Route::get('roles/create', [RoleController::class, 'create'])
        ->middleware('permission:role-create')
        ->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])
        ->middleware('permission:role-create')
        ->name('roles.store');

    Route::get('roles/show/{role}', [RoleController::class, 'show'])
        ->middleware('permission:role-view')
        ->name('roles.show');

    Route::get('roles/edit/{role}', [RoleController::class, 'edit'])
        ->middleware('permission:role-edit')
        ->name('roles.edit');
    Route::put('roles/update/{role}', [RoleController::class, 'update'])
        ->middleware('permission:role-edit')
        ->name('roles.update');

    Route::delete('roles/delete/{role}', [RoleController::class, 'destroy'])
        ->middleware('permission:role-delete')
        ->name('roles.destroy');

    # Permission Route List
    Route::get('permission', [PermissionController::class, 'index'])->name('permission.index');

    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');

    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');

    Route::get('permission/edit/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('permission/update/{permission}', [PermissionController::class, 'update'])->name('permission.update');

    Route::delete('permission/destroy/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    # User Route List
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');

    Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/update/{user}', [UserController::class, 'update'])->name('users.update');

    Route::delete('users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    # Product Route List
    Route::get('products', [ProductController::class, 'index'])->name('products.index');

    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');

    Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/update/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    # ============== Page Route ============== #

    Route::get('pages', [PageController::class, 'index'])->name('pages.index');

    Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('pages/store', [PageController::class, 'store'])->name('pages.store');

    Route::get('pages/edit/{page}', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('pages/update/{page}', [PageController::class, 'update'])->name('pages.update');

    Route::delete('pages/delete/{page}', [PageController::class, 'destroy'])->name('pages.destroy');
});


require __DIR__ . '/auth.php';
