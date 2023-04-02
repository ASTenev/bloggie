<?php

namespace App\Providers;

use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PostRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepository::class, PostRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(PostService::class, function ($app) {
            return new PostService($app->make(PostRepository::class), $app->make(CategoryRepository::class));
        });

        $this->app->bind(PostRequest::class, function ($app) {
            return new PostRequest();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
