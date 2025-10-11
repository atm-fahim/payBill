<?php

namespace App\Providers;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\EloquentRepositoryInterface;
use App\Interfaces\Repo\Frontend\CategoryRepo;

use App\Interfaces\Repo\Frontend\StudentUserRepo;
use App\Repository\Frontend\CategoryRepoImpl;
use App\Repository\Frontend\StudentUserRepoImpl;
use Illuminate\Support\ServiceProvider;

class FrontendRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepo::class, CategoryRepoImpl::class);
        $this->app->bind(EloquentRepositoryInterface::class, EloquentBaseRepository::class);
//        $this->app->bind(StudentUserRepo::class, StudentUserRepoImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
