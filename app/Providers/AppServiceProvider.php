<?php

namespace App\Providers;

use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Service\ServiceRepository;

use App\Repositories\UserInfo\UserInfoRepositoryInterface;
use App\Repositories\UserInfo\UserInfoRepository;





use App\Repositories\Ads\AdsRepositoryInterface;
use App\Repositories\Ads\AdsRepository;



use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;

use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\City\CityRepository;

use App\Repositories\Country\CountryRepositoryInterface;
use App\Repositories\Country\CountryRepository;


use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;











use App\Repositories\blog\blogRepositoryInterface;
use App\Repositories\blog\blogRepository;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {
//
        
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        
        $this->app->bind(AdsRepositoryInterface::class, AdsRepository::class);
        
        $this->app->bind(UserInfoRepositoryInterface::class, UserInfoRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
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
