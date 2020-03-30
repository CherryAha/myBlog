<?php
/*
 * @Descripttion: 
 * @version: 
 * @Author: syt
 * @Create-Date: Do not edit
 * @Update-Date: Do not edit
 */

namespace App\Providers;

use App\Repository\BlogRepositoryInterface;
use App\Repository\BlogRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
