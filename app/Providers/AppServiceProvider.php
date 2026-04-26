<?php

namespace App\Providers;

use App\Repositories\Ads\AdsRepositoryInterface;
use App\Repositories\Ads\AdsRepository;

use App\Repositories\UserPacakges\UserPacakgesRepositoryInterface;
use App\Repositories\UserPacakges\UserPacakgesRepository;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;


use App\Repositories\BagItems\BagItemsRepositoryInterface;
use App\Repositories\BagItems\BagItemsRepository;




use App\Repositories\BagsCategory\BagsCategoryRepositoryInterface;
use App\Repositories\BagsCategory\BagsCategoryRepository;

use App\Repositories\Bag\BagRepositoryInterface;
use App\Repositories\Bag\BagRepository;

use App\Repositories\Package\PackageRepositoryInterface;
use App\Repositories\Package\PackageRepository;

use App\Repositories\Feature\FeatureRepositoryInterface;
use App\Repositories\Feature\FeatureRepository;


use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\Posts\PostsRepository;

use App\Repositories\verification\verificationRepositoryInterface;
use App\Repositories\verification\verificationRepository;

use App\Repositories\Branch\BranchRepositoryInterface;
use App\Repositories\Branch\BranchRepository;

use App\Repositories\MyCertificate\MyCertificateRepositoryInterface;
use App\Repositories\MyCertificate\MyCertificateRepository;

use App\Repositories\Project\ProjectRepositoryInterface;
use App\Repositories\Project\ProjectRepository;






use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Service\ServiceRepository;

use App\Repositories\UserInfo\UserInfoRepositoryInterface;
use App\Repositories\UserInfo\UserInfoRepository;









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
        
        
        
        
        $this->app->bind(UserInfoRepositoryInterface::class, UserInfoRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        
        
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(MyCertificateRepositoryInterface::class, MyCertificateRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(verificationRepositoryInterface::class, verificationRepository::class);
        $this->app->bind(PostsRepositoryInterface::class, PostsRepository::class);
        
        $this->app->bind(FeatureRepositoryInterface::class, FeatureRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(BagRepositoryInterface::class, BagRepository::class);
        $this->app->bind(BagsCategoryRepositoryInterface::class, BagsCategoryRepository::class);
        $this->app->bind(BagItemsRepositoryInterface::class, BagItemsRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserPacakgesRepositoryInterface::class, UserPacakgesRepository::class);
        $this->app->bind(AdsRepositoryInterface::class, AdsRepository::class);
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
