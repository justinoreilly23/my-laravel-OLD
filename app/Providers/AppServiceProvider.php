<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ThemeController;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $themeCont = new ThemeController();
        view()->share('theme', $themeCont->setTheme());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal())
        {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}

