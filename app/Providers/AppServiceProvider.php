<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Pages\OrdenesMesa;
use Illuminate\Support\Facades\Route;
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
        Route::get('/admin/ordenes-mesa/{id}', [OrdenesMesa::class, 'render'])
        ->name('filament.pages.ordenes-mesa');
    }
}
