<?php

namespace App\Providers;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\EloquentRepositoryInterface;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\AlbumRepo;
use App\Interfaces\Repo\Backend\BackendMenuRepo;
use App\Interfaces\Repo\Backend\BatchRepo;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Backend\CategoryRepo;
use App\Interfaces\Repo\Backend\ClientRepo;
use App\Interfaces\Repo\Backend\ContactUsRepo;
use App\Interfaces\Repo\Backend\CourseRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Interfaces\Repo\Backend\DashBoardLogRepo;
use App\Interfaces\Repo\Backend\DesignationRepo;
use App\Interfaces\Repo\Backend\FaqRepo;
use App\Interfaces\Repo\Backend\ImageRepo;
use App\Interfaces\Repo\Backend\LogoRepo;
use App\Interfaces\Repo\Backend\MenuPermissionRepo;
use App\Interfaces\Repo\Backend\NoticeRepo;
use App\Interfaces\Repo\Backend\OrganizationRepo;
use App\Interfaces\Repo\Backend\OurClientRepo;
use App\Interfaces\Repo\Backend\OurCompanyRepo;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\PaymentMethodRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\SliderRepo;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Interfaces\Repo\Backend\TeamRepo;
use App\Interfaces\Repo\Backend\UniversityRepo;
use App\Interfaces\Repo\Backend\UpcomingRepo;
use App\Interfaces\Repo\Backend\UserAccessTypeRepo;
use App\Interfaces\Repo\Backend\UserRepo;


use App\Interfaces\Repo\Backend\YourDestinationRepo;
use App\Repository\Backend\AboutUsRepoImpl;
use App\Repository\Backend\AlbumRepoImpl;
use App\Repository\Backend\BackendMenuRepoImpl;
use App\Repository\Backend\BatchRepoImpl;
use App\Repository\Backend\BranchRepoImpl;
use App\Repository\Backend\CategoryRepoImpl;
use App\Repository\Backend\ClientRepoImpl;
use App\Repository\Backend\ContactUsRepoImpl;
use App\Repository\Backend\CourseRepoImpl;
use App\Repository\Backend\CustomerRepoImpl;
use App\Repository\Backend\DashBoardLogRepoImpl;
use App\Repository\Backend\DesignationRepoImpl;
use App\Repository\Backend\FaqRepoImpl;
use App\Repository\Backend\ImageRepoImpl;
use App\Repository\Backend\LogoRepoImpl;
use App\Repository\Backend\MenuPermissionRepoImpl;
use App\Repository\Backend\NoticeRepoImpl;
use App\Repository\Backend\OrganizationRepoImpl;
use App\Repository\Backend\OurClientRepoImpl;
use App\Repository\Backend\OurCompanyRepoImpl;
use App\Repository\Backend\OurProductRepoImpl;
use App\Repository\Backend\PaymentMethodRepoImpl;
use App\Repository\Backend\ServiceRepoImpl;
use App\Repository\Backend\SliderRepoImpl;
use App\Repository\Backend\SupplierRepoImpl;
use App\Repository\Backend\TeamRepoImpl;
use App\Repository\Backend\UniversityRepoImpl;
use App\Repository\Backend\UpcomingRepoImpl;
use App\Repository\Backend\UserAccessTypeRepoImpl;
use App\Repository\Backend\UserRepoImpl;
use App\Repository\Backend\YourDestinationRepoImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BranchRepo::class, BranchRepoImpl::class);
        $this->app->bind(BatchRepo::class, BatchRepoImpl::class);
        $this->app->bind(BackendMenuRepo::class, BackendMenuRepoImpl::class);
        $this->app->bind(ContactUsRepo::class, ContactUsRepoImpl::class);
        $this->app->bind(CustomerRepo::class, CustomerRepoImpl::class);
        $this->app->bind(CategoryRepo::class, CategoryRepoImpl::class);
        $this->app->bind(EloquentRepositoryInterface::class, EloquentBaseRepository::class);
        $this->app->bind(LogoRepo::class, LogoRepoImpl::class);
        $this->app->bind(MenuPermissionRepo::class, MenuPermissionRepoImpl::class);
        $this->app->bind(NoticeRepo::class, NoticeRepoImpl::class);
        $this->app->bind(OrganizationRepo::class, OrganizationRepoImpl::class);
        $this->app->bind(PaymentMethodRepo::class, PaymentMethodRepoImpl::class);
        $this->app->bind(SupplierRepo::class, SupplierRepoImpl::class);
        $this->app->bind(UserAccessTypeRepo::class, UserAccessTypeRepoImpl::class);
        $this->app->bind(UserRepo::class, UserRepoImpl::class);
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
