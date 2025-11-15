<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\PreOrder;

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
        // Share jumlah preorder belum diapprove ke semua view
        View::composer('*', function ($view) {
            $pendingCount = PreOrder::where('status_approve', false)->count();
            $view->with('pendingCount', $pendingCount);
        });
    }
}
