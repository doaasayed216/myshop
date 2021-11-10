<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Blade::if('admin', function (){
            return request()->user()->role_id === Role::IS_ADMIN;
        });

        Blade::if('seller', function () {
            return request()->user()->role_id === Role::IS_SELLER;
        });

    }
}
