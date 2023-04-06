<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $repositories = [
        \App\Http\Repositories\Product\ProductRepositoryInterface::class => \App\Http\Repositories\Product\ProductRepository::class,
        \App\Http\Repositories\Category\CategoryRepositoryInterface::class => \App\Http\Repositories\Category\CategoryRepository::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->repositories as $interface => $repository) {
            App::bind($interface, $repository);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
