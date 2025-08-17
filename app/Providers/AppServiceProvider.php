<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Global data share
        // $user = Auth::user();

        // // $globalSettings = Setting::first();

        // View()->share('user', Auth::user());

        // user info global করতে চাইলে
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });


    }
}
