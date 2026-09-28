<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS in GitHub Codespaces environment
        if (request()->server->has('HTTP_X_FORWARDED_PROTO') && request()->server->get('HTTP_X_FORWARDED_PROTO') === 'https') {
            URL::forceScheme('https');
        }

        // Handle proxy headers from Codespaces forwarded ports
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            URL::forceRootUrl('https://' . $_SERVER['HTTP_X_FORWARDED_HOST']);
        }
    }
}