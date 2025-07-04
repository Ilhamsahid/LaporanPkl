<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Route::middleware('web')
        ->group(base_path('routes/admin.php'));

        Route::middleware('web')
        ->group(base_path('routes/pembimbing.php'));

        Route::middleware('web')
        ->group(base_path('routes/siswa.php'));

        View::composer('*', function ($view) {
            $activeGuard = getCurrentGuard();

            $view->with('role', $activeGuard);
        });
    }
}