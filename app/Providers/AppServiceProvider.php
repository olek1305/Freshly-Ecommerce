<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useBootstrap();

        // check if it has table general_settings
        if (Schema::hasTable('general_settings')) {
            $generalSetting = GeneralSetting::first();

            if ($generalSetting) {
                // set time zone
                Config::set('app.timezone', $generalSetting->timezone);

                // share variable at all view
                View::composer('*', function ($view) use ($generalSetting) {
                    $view->with('settings', $generalSetting);
                });
            } else {
                // Log no data, but do not interrupt operation
                Log::info('No general settings found.');
            }
        } else {
            // Log the table missing, but do not interrupt the operation
            Log::info('Table general_settings not found.');
        }
    }

}
