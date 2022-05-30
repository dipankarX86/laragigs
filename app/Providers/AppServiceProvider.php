<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // this is to solve the database problem of maximum length of a string
        Schema::defaultStringLength(191);

        // fillable properties issues, to unguard putting them into the database
        Model::unguard();

        // paginator template
        // Paginator::useBootstrapThree();
    }
}
