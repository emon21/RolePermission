# Laravel Project Role&&Permission Setup

-   Laravel Application More then Secure of Package
-   Controll All User Access on Feature/menu

### Laravel Install

-   [https://laravel.com/docs/12.x] [Laravel Install]

-   If you already have PHP and Composer installed, you may install the Laravel installer via Composer:
-   composer global require laravel/installer

-   Creating an Application
    After you have installed PHP, Composer, and the Laravel installer, you're ready to create a new Laravel application. The Laravel installer will prompt you to select your preferred testing framework, database, and starter kit:

-   laravel new example-app

# =========================

### Laravel Authentication Package

-   [https://laravel.com/docs/10.x/starter-kits#laravel-breeze] [laravel-breeze Authentication]

Installation
First, you should create a new Laravel application, configure your database, and run your database migrations. Once you have created a new Laravel application, you may install Laravel Breeze using Composer:

-   composer require laravel/breeze --dev

The breeze:install command will prompt you for your preferred frontend stack and testing framework:

-   php artisan breeze:install

-   php artisan migrate
-   npm install
-   npm run dev

# -------------------------

Breeze and Blade
The default Breeze "stack" is the Blade stack, which utilizes simple Blade templates to render your application's frontend. The Blade stack may be installed by invoking the breeze:install command with no other additional arguments and selecting the Blade frontend stack. After Breeze's scaffolding is installed, you should also compile your application's frontend assets:

-   php artisan breeze:install

-   php artisan migrate
-   npm install
-   npm run dev

Next, you may navigate to your application's /login or /register URLs in your web browser. All of Breeze's routes are defined within the routes/auth.php file.

# =========================

### Role&&Permission Package Setup

# Laravel Permission

-   Associate users with roles and permissions
    Use this package to easily add permissions or roles to users in your Laravel app.

Introduction
This package allows you to manage user permissions and roles in a database.

// Adding permissions to a user
$user->givePermissionTo('edit articles');

// Adding permissions via a role
$user->assignRole('writer');

$role->givePermissionTo('edit articles');

# -------------

$user->can('edit articles');

# --------------

Blade directives:

@can('edit articles')
...
@endcan

# Installation in Laravel

1.Consult the Prerequisites page for important considerations regarding your User models!

2.This package publishes a config/permission.php file. If you already have a file by that name, you must rename or remove it.

3.You can install the package via composer:

-> composer require spatie/laravel-permission

4.The Service Provider will automatically be registered; however, if you wish to manually register it, you can manually add the Spatie\Permission\PermissionServiceProvider::class service provider to the array in bootstrap/providers.php (config/app.php in Laravel 10 or older).

5.You should publish the migration and the config/permission.php config file with:

-> php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider

6.BEFORE RUNNING MIGRATIONS

If you are using UUIDs, see the Advanced section of the docs on UUID steps, before you continue. It explains some changes you may want to make to the migrations and config file before continuing. It also mentions important considerations after extending this package's models for UUID capability.

If you are going to use the TEAMS features you must update your config/permission.php config file:

must set 'teams' => true,
and (optional) you may set team_foreign_key name in the config file if you want to use a custom foreign key in your database for teams
If you are using MySQL 8+, look at the migration files for notes about MySQL 8+ to set/limit the index key length, and edit accordingly. If you get ERROR: 1071 Specified key was too long then you need to do this.

If you are using CACHE_STORE=database, be sure to install Laravel's cache migration, else you will encounter cache errors.

7.Clear your config cache. This package requires access to the permission config settings in order to run migrations. If you've been caching configurations locally, clear your config cache with either of these commands:

-> php artisan optimize:clear

# or

-> php artisan config:clear

8.Run the migrations: After the config and migration have been published and configured, you can create the tables for this package by running:

    -> php artisan migrate

9.Add the necessary trait to your User model:

// The User model requires this trait
-> use HasRoles;

10.Consult the Basic Usage section of the docs to get started using the features of this package.

# Default config file contents

You can view the default config file contents at:
[https://github.com/spatie/laravel-permission/blob/main/config/permission.php]

# =========================

# Basic Usage

Add The Trait
First, add the Spatie\Permission\Traits\HasRoles trait to your User model(s):

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
use HasRoles;

      // ...

}

# =========================

# Permission All Access

# Role All Access
