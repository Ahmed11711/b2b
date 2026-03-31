<?php

namespace App\Providers;

use App\Repositories\blog\blogRepositoryInterface;
use App\Repositories\blog\blogRepository;

use App\Repositories\blogs\blogsRepository;
use App\Repositories\blogs\blogsRepositoryInterface;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(blogsRepositoryInterface::class, blogsRepository::class);
        $this->app->bind(blogRepositoryInterface::class, blogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Validator::extend('display_field', function ($attribute, $value, $parameters, $validator) {
            return true;
        });
    }
}
