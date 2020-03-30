<?php

namespace App\Providers;

use App\Repository\ArticleRepository;
use App\Repository\BlogRepository;
use App\Repository\BlogRepositoryInterface;
use App\Repository\Interfac\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( ArticleRepositoryInterface::class, ArticleRepository::class );
    }
}
