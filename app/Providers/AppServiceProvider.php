<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        // View::composer('*', function ($view) {
        //     if (Auth::check()) {
        //         $user = User::with('settings')->find(Auth::user()->id);
        //         Log::info($user);
        //         // $view->with('user_proof', Auth::user()->show_popup);
        //         // $view->with('user', Auth::user());
        //     }
        // });
    }
}
