<?php

namespace App\Providers;

use App\Models\Category;
use Exception;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // hiển chị category lên tất cả các trang
        try{
            $categoryList = Category::all();
            View::share('categoryList', $categoryList);
        }catch(Exception $ex){}

        
    }
}
