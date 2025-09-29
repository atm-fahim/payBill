<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', [App\Http\Controllers\Frontend\StudentLoginController::class, 'login']);
Route::get('/', [App\Http\Controllers\FrontendHomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

//Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
//Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);
//
//Route::get('auth/facebook', [LoginWithFacebookController::class, 'redirectFacebook']);
//Route::get('callback/facebook', [LoginWithFacebookController::class, 'facebookCallback']);

Route::prefix('/frontend')->name('frontend.')->group(function () {
    Route::get('/home', [App\Http\Controllers\FrontendHomeController::class, 'index'])->name('home');
    Route::get('/signin', [App\Http\Controllers\Frontend\StudentLoginController::class, 'login'])->name('signin');
    Route::POST('/login-check', [App\Http\Controllers\Frontend\StudentLoginController::class, 'loginCheck'])->name('login-check');
    Route::get('/signup', [App\Http\Controllers\Frontend\StudentLoginController::class, 'signup'])->name('signup');
    Route::get('/emp-info/{empId}', [App\Http\Controllers\Frontend\StudentLoginController::class, 'studentInfo'])->name('emp-info');
    Route::post('/signup-new-users', [App\Http\Controllers\Frontend\StudentLoginController::class, 'createStudentUser'])->name('signup-new-users');

//    Route::POST('/career-login-check', [App\Http\Controllers\Frontend\CareerUserLoginController::class, 'loginCareerUser'])->name('career-login-check');
    Route::POST('/login-check', [App\Http\Controllers\Frontend\StudentLoginController::class, 'loginCheck'])->name('login-check');
    Route::get('/faq', [App\Http\Controllers\Frontend\FaqController::class, 'faqInfo'])->name('faq');
    Route::get('/contact-us', [App\Http\Controllers\Frontend\ContactUsController::class, 'contactInfo'])->name('contact-us');

    Route::get('/about-us', [App\Http\Controllers\Frontend\AboutUsController::class, 'index'])->name('about-us');
    Route::get('/mission-vision', [App\Http\Controllers\Frontend\AboutUsController::class, 'missionVision'])->name('mission-vision');
    Route::get('/chairman-profile', [App\Http\Controllers\Frontend\AboutUsController::class, 'chairmanProfile'])->name('chairman-profile');

    Route::get('/all-services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('all-services');
    Route::get('/services-details/{slug}', [App\Http\Controllers\Frontend\ServiceController::class, 'serviceDetails'])->name('services-details');

    Route::get('/album', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('album');
    Route::get('/album-images/{id}', [App\Http\Controllers\Frontend\GalleryController::class, 'getImageInfoById'])->name('album-images');

    Route::get('/all-notice-event', [App\Http\Controllers\Frontend\NoticeEventController::class, 'index'])->name('all-notice-event');
    Route::get('/notice-event-details/{slug}', [App\Http\Controllers\Frontend\NoticeEventController::class, 'noticeDetails'])->name('notice-event-details');

    Route::get('/all-product', [App\Http\Controllers\Frontend\OurProductController::class, 'index'])->name('all-product');
    Route::get('/products-details/{slug}', [App\Http\Controllers\Frontend\OurProductController::class, 'productDetails'])->name('products-details');

    Route::get('/branch', [App\Http\Controllers\Frontend\BranchController::class, 'index'])->name('branch');
    Route::get('/branch-info/{slug}', [App\Http\Controllers\Frontend\BranchController::class, 'branchInfo'])
        ->name('branch-info');

    Route::get('/company', [App\Http\Controllers\Frontend\CompanyController::class, 'index'])->name('company');
    Route::get('/company-info/{slug}', [App\Http\Controllers\Frontend\CompanyController::class, 'companyInfo'])
        ->name('company-info');

    //Assessment Exam
});
//Student Home page after login
Route::group(['middleware' => 'student'], function () {
    Route::post('/sign-out', [App\Http\Controllers\Frontend\StudentLoginController::class, 'studentTest'])->name('sign-out');
    Route::get('/my-profile', [App\Http\Controllers\Frontend\StudentLoginController::class, 'myProfile'])->name('my-profile');
});
//Auth::routes();
Auth::routes(['register' => false]);
Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard-total-count-log', [App\Http\Controllers\Backend\DashboardLogController::class, 'dashBoardTotalLog'])->name('dashboard-total-count-log');
/* User Permission */
Route::get('/permission', [App\Http\Controllers\Backend\UserPermissionController::class, 'index'])->name('permission');
Route::get('/show-permission-menu/{permission_type}', [App\Http\Controllers\Backend\UserPermissionController::class, 'getPermissionMenu']);
Route::post('/give-permission', [App\Http\Controllers\Backend\UserPermissionController::class, 'givePermission'])->name('give-permission');

/* User section */
Route::get('/users', [App\Http\Controllers\Backend\UsersController::class, 'index'])->name('users');
Route::post('/user-save-update', [App\Http\Controllers\Backend\UsersController::class, 'saveUpdate'])->name('user-save-update');
Route::get('/user-edit/{id}', [App\Http\Controllers\Backend\UsersController::class, 'edit']);
Route::get('/user-delete/{id}', [App\Http\Controllers\Backend\UsersController::class, 'delete'])->name('user-delete');
Route::get('/user-in-active/{id}', [App\Http\Controllers\Backend\UsersController::class, 'inActive'])->name('user-in-active');
Route::get('/user-active/{id}', [App\Http\Controllers\Backend\UsersController::class, 'active'])->name('user-active');

//***** User type section *****
Route::get('/user-type', [App\Http\Controllers\Backend\UsersTypeController::class, 'index'])->name('user-type');
Route::post('/user-type-save-update', [App\Http\Controllers\Backend\UsersTypeController::class, 'saveUpdate'])->name('user-type-save-update');
Route::get('/user-type-edit/{id}', [App\Http\Controllers\Backend\UsersTypeController::class, 'edit']);
Route::get('/user-type-delete/{id}', [App\Http\Controllers\Backend\UsersTypeController::class, 'delete'])->name('user-type-delete');
Route::get('/user-type-in-active/{id}', [App\Http\Controllers\Backend\UsersTypeController::class, 'inActive'])->name('user-type-in-active');
Route::get('/user-type-active/{id}', [App\Http\Controllers\Backend\UsersTypeController::class, 'active'])->name('user-type-active');

//***** Backend Menu section *****
Route::get('/backend-menu', [App\Http\Controllers\Backend\MenuController::class, 'index'])->name('backend-menu');
Route::post('/backend-menu-save-update', [App\Http\Controllers\Backend\MenuController::class, 'saveUpdate'])->name('backend-menu-save-update');
Route::get('/backend-menu-edit/{id}', [App\Http\Controllers\Backend\MenuController::class, 'edit']);
Route::get('/backend-menu-delete/{id}', [App\Http\Controllers\Backend\MenuController::class, 'delete'])->name('backend-menu-delete');
Route::get('/backend-menu-in-active/{id}', [App\Http\Controllers\Backend\MenuController::class, 'inActive'])->name('backend-menu-in-active');
Route::get('/backend-menu-active/{id}', [App\Http\Controllers\Backend\MenuController::class, 'active'])->name('backend-menu-active');

/* organization section */
Route::get('/organization', [App\Http\Controllers\Backend\OrganizationController::class, 'index'])->name('organization');
Route::post('/organization-save-update', [App\Http\Controllers\Backend\OrganizationController::class, 'saveUpdate'])->name('organization-save-update');
Route::get('/organization-edit/{id}', [App\Http\Controllers\Backend\OrganizationController::class, 'edit']);
Route::get('/organization-delete/{id}', [App\Http\Controllers\Backend\OrganizationController::class, 'delete'])->name('organization-delete');
Route::get('/organization-in-active/{id}', [App\Http\Controllers\Backend\OrganizationController::class, 'inActive'])->name('organization-in-active');
Route::get('/organization-active/{id}', [App\Http\Controllers\Backend\OrganizationController::class, 'active'])->name('organization-active');
/* about us section */
Route::get('/about', [App\Http\Controllers\Backend\AboutUsController::class, 'index'])->name('about');
Route::post('/about-save-update', [App\Http\Controllers\Backend\AboutUsController::class, 'saveUpdate'])->name('about-save-update');
Route::get('/about-edit/{id}', [App\Http\Controllers\Backend\AboutUsController::class, 'edit']);
Route::get('/about-delete/{id}', [App\Http\Controllers\Backend\AboutUsController::class, 'delete'])->name('about-delete');
Route::get('/about-in-active/{id}', [App\Http\Controllers\Backend\AboutUsController::class, 'inActive'])->name('about-in-active');
Route::get('/about-active/{id}', [App\Http\Controllers\Backend\AboutUsController::class, 'active'])->name('about-active');

/* service section */
Route::get('/add-service', [App\Http\Controllers\Backend\ServiceController::class, 'index'])->name('add-service');
Route::post('/service-save-update', [App\Http\Controllers\Backend\ServiceController::class, 'saveUpdate'])->name('service-save-update');
Route::get('/service-edit/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'edit']);
Route::get('/service-delete/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'delete'])->name('service-delete');
Route::get('/service-in-active/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'inActive'])->name('service-in-active');
Route::get('/service-active/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'active'])->name('service-active');

/* upcoming section */
Route::get('/upcoming-project', [App\Http\Controllers\Backend\UpcomingController::class, 'index'])->name('upcoming-project');
Route::post('/upcoming-project-save-update', [App\Http\Controllers\Backend\UpcomingController::class, 'saveUpdate'])->name('upcoming-project-save-update');
Route::get('/upcoming-project-edit/{id}', [App\Http\Controllers\Backend\UpcomingController::class, 'edit']);
Route::get('/upcoming-project-delete/{id}', [App\Http\Controllers\Backend\UpcomingController::class, 'delete'])->name('upcoming-project-delete');
Route::get('/upcoming-project-in-active/{id}', [App\Http\Controllers\Backend\UpcomingController::class, 'inActive'])->name('upcoming-project-in-active');
Route::get('/upcoming-project-active/{id}', [App\Http\Controllers\Backend\UpcomingController::class, 'active'])->name('upcoming-project-active');

/* Product section */
Route::get('/our-product', [App\Http\Controllers\Backend\OurProductController::class, 'index'])->name('our-product');
Route::post('/our-product-save-update', [App\Http\Controllers\Backend\OurProductController::class, 'saveUpdate'])->name('our-product-save-update');
Route::get('/our-product-edit/{id}', [App\Http\Controllers\Backend\OurProductController::class, 'edit']);
Route::get('/our-product-delete/{id}', [App\Http\Controllers\Backend\OurProductController::class, 'delete'])->name('our-product-delete');
Route::get('/our-product-in-active/{id}', [App\Http\Controllers\Backend\OurProductController::class, 'inActive'])->name('our-product-in-active');
Route::get('/our-product-active/{id}', [App\Http\Controllers\Backend\OurProductController::class, 'active'])->name('our-product-active');

/* Destination section */
Route::get('/your-destination', [App\Http\Controllers\Backend\YourDestinationController::class, 'index'])->name('your-destination');
Route::post('/your-destination-save-update', [App\Http\Controllers\Backend\YourDestinationController::class, 'saveUpdate'])->name('your-destination-save-update');
Route::get('/your-destination-edit/{id}', [App\Http\Controllers\Backend\YourDestinationController::class, 'edit']);
Route::get('/your-destination-delete/{id}', [App\Http\Controllers\Backend\YourDestinationController::class, 'delete'])->name('your-destination-delete');
Route::get('/your-destination-in-active/{id}', [App\Http\Controllers\Backend\YourDestinationController::class, 'inActive'])->name('your-destination-in-active');
Route::get('/your-destination-active/{id}', [App\Http\Controllers\Backend\YourDestinationController::class, 'active'])->name('your-destination-active');

/* University section */
Route::get('/add-university', [App\Http\Controllers\Backend\UniversityController::class, 'index'])->name('add-university');
Route::post('/university-save-update', [App\Http\Controllers\Backend\UniversityController::class, 'saveUpdate'])->name('university-save-update');
Route::get('/university-edit/{id}', [App\Http\Controllers\Backend\UniversityController::class, 'edit']);
Route::get('/university-delete/{id}', [App\Http\Controllers\Backend\UniversityController::class, 'delete'])->name('university-delete');
Route::get('/university-in-active/{id}', [App\Http\Controllers\Backend\UniversityController::class, 'inActive'])->name('university-in-active');
Route::get('/university-active/{id}', [App\Http\Controllers\Backend\UniversityController::class, 'active'])->name('university-active');

/* course section */
Route::get('/add-course', [App\Http\Controllers\Backend\CourseController::class, 'index'])->name('add-course');
Route::post('/course-save-update', [App\Http\Controllers\Backend\CourseController::class, 'saveUpdate'])->name('course-save-update');
Route::get('/course-edit/{id}', [App\Http\Controllers\Backend\CourseController::class, 'edit']);
Route::get('/course-delete/{id}', [App\Http\Controllers\Backend\CourseController::class, 'delete'])->name('course-delete');
Route::get('/course-in-active/{id}', [App\Http\Controllers\Backend\CourseController::class, 'inActive'])->name('course-in-active');
Route::get('/course-active/{id}', [App\Http\Controllers\Backend\CourseController::class, 'active'])->name('course-active');
Route::get('/university-list', [App\Http\Controllers\Backend\CourseController::class, 'getUniversityListByDestinationId'])->name('university-list');


/* Our Client section */
Route::get('/add-client', [App\Http\Controllers\Backend\OurClientController::class, 'index'])->name('add-client');
Route::post('/add-client-save-update', [App\Http\Controllers\Backend\OurClientController::class, 'saveUpdate'])->name('add-client-save-update');
Route::get('/add-client-edit/{id}', [App\Http\Controllers\Backend\OurClientController::class, 'edit']);
Route::get('/add-client-delete/{id}', [App\Http\Controllers\Backend\OurClientController::class, 'delete'])->name('add-client-delete');
Route::get('/add-client-in-active/{id}', [App\Http\Controllers\Backend\OurClientController::class, 'inActive'])->name('add-client-in-active');
Route::get('/add-client-active/{id}', [App\Http\Controllers\Backend\OurClientController::class, 'active'])->name('add-client-active');


/* team member section */
Route::get('/team-member', [App\Http\Controllers\Backend\TeamController::class, 'index'])->name('team-member');
Route::post('/team-member-save-update', [App\Http\Controllers\Backend\TeamController::class, 'saveUpdate'])->name('team-member-save-update');
Route::get('/team-member-edit/{id}', [App\Http\Controllers\Backend\TeamController::class, 'edit']);
Route::get('/team-member-delete/{id}', [App\Http\Controllers\Backend\TeamController::class, 'delete'])->name('team-member-delete');
Route::get('/team-member-in-active/{id}', [App\Http\Controllers\Backend\TeamController::class, 'inActive'])->name('team-member-in-active');
Route::get('/team-member-active/{id}', [App\Http\Controllers\Backend\TeamController::class, 'active'])->name('team-member-active');

/* branch section */
Route::get('/branch', [App\Http\Controllers\Backend\BranchController::class, 'index'])->name('branch');
Route::post('/branch-save-update', [App\Http\Controllers\Backend\BranchController::class, 'saveUpdate'])->name('branch-save-update');
Route::get('/branch-edit/{id}', [App\Http\Controllers\Backend\BranchController::class, 'edit']);
Route::get('/branch-delete/{id}', [App\Http\Controllers\Backend\BranchController::class, 'delete'])->name('branch-delete');
Route::get('/branch-in-active/{id}', [App\Http\Controllers\Backend\BranchController::class, 'inActive'])->name('branch-in-active');
Route::get('/branch-active/{id}', [App\Http\Controllers\Backend\BranchController::class, 'active'])->name('branch-active');

/* Company section */
Route::get('/company', [App\Http\Controllers\Backend\OurCompanyController::class, 'index'])->name('company');
Route::post('/company-save-update', [App\Http\Controllers\Backend\OurCompanyController::class, 'saveUpdate'])->name('company-save-update');
Route::get('/company-edit/{id}', [App\Http\Controllers\Backend\OurCompanyController::class, 'edit']);
Route::get('/company-delete/{id}', [App\Http\Controllers\Backend\OurCompanyController::class, 'delete'])->name('company-delete');
Route::get('/company-in-active/{id}', [App\Http\Controllers\Backend\OurCompanyController::class, 'inActive'])->name('company-in-active');
Route::get('/company-active/{id}', [App\Http\Controllers\Backend\OurCompanyController::class, 'active'])->name('company-active');

/* category section */
Route::get('/category', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('category');
Route::post('/category-save-update', [App\Http\Controllers\Backend\CategoryController::class, 'saveUpdate'])->name('category-save-update');
Route::get('/category-edit/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'edit']);
Route::get('/category-delete/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'delete'])->name('category-delete');
Route::get('/category-in-active/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'inActive'])->name('category-in-active');
Route::get('/category-active/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'active'])->name('category-active');


/* Slider section */
Route::get('/add-slider', [App\Http\Controllers\Backend\SliderController::class, 'index'])->name('add-slider');
Route::post('/slider-save-update', [App\Http\Controllers\Backend\SliderController::class, 'saveUpdate'])->name('slider-save-update');
Route::get('/slider-edit/{id}', [App\Http\Controllers\Backend\SliderController::class, 'edit']);
Route::get('/slider-delete/{id}', [App\Http\Controllers\Backend\SliderController::class, 'delete'])->name('slider-delete');
Route::get('/slider-in-active/{id}', [App\Http\Controllers\Backend\SliderController::class, 'inActive'])->name('slider-in-active');
Route::get('/slider-active/{id}', [App\Http\Controllers\Backend\SliderController::class, 'active'])->name('slider-active');

/* logo section */
Route::get('/logo', [App\Http\Controllers\Backend\LogoController::class, 'index'])->name('logo');
Route::post('/logo-save-update', [App\Http\Controllers\Backend\LogoController::class, 'saveUpdate'])->name('logo-save-update');
Route::get('/logo-edit/{id}', [App\Http\Controllers\Backend\LogoController::class, 'edit']);
Route::get('/logo-delete/{id}', [App\Http\Controllers\Backend\LogoController::class, 'delete'])->name('logo-delete');
Route::get('/logo-in-active/{id}', [App\Http\Controllers\Backend\LogoController::class, 'inActive'])->name('logo-in-active');
Route::get('/logo-active/{id}', [App\Http\Controllers\Backend\LogoController::class, 'active'])->name('logo-active');

/* logo section */
Route::get('/contact-us', [App\Http\Controllers\Backend\ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-us-save-update', [App\Http\Controllers\Backend\ContactUsController::class, 'saveUpdate'])->name('contact-us-save-update');
Route::get('/contact-us-edit/{id}', [App\Http\Controllers\Backend\ContactUsController::class, 'edit']);
Route::get('/contact-us-delete/{id}', [App\Http\Controllers\Backend\ContactUsController::class, 'delete'])->name('contact-us-delete');
Route::get('/contact-us-in-active/{id}', [App\Http\Controllers\Backend\ContactUsController::class, 'inActive'])->name('contact-us-in-active');
Route::get('/contact-us-active/{id}', [App\Http\Controllers\Backend\ContactUsController::class, 'active'])->name('contact-us-active');



/* payment method section */
Route::get('/payment-method', [App\Http\Controllers\Backend\PaymentMethodController::class, 'index'])->name('payment-method');
Route::post('/payment-method-save-update', [App\Http\Controllers\Backend\PaymentMethodController::class, 'saveUpdate'])->name('payment-method-save-update');
Route::get('/payment-method-edit/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'edit']);
Route::get('/payment-method-delete/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'delete'])->name('payment-method-delete');
Route::get('/payment-method-in-active/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'inActive'])->name('payment-method-in-active');
Route::get('/payment-method-active/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'active'])->name('payment-method-active');


Route::get('/#', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('#');
/* quiz section */
//Route::get('/exam', [App\Http\Controllers\Backend\ExamController::class, 'index'])->name('exam');
//Route::get('/quiz-test/{id}', [App\Http\Controllers\Backend\ExamController::class, 'quizTest'])->name('quiz-test');
/* result */



/* Designation */
Route::get('/designation', [App\Http\Controllers\Backend\DesignationController::class, 'index'])->name('designation');
Route::post('/designation-save-update', [App\Http\Controllers\Backend\DesignationController::class, 'saveUpdate'])->name('designation-save-update');
Route::get('/designation-edit/{id}', [App\Http\Controllers\Backend\DesignationController::class, 'edit'])->name('designation-edit');
Route::get('/designation-delete/{id}', [App\Http\Controllers\Backend\DesignationController::class, 'delete'])->name('designation-delete');
Route::get('/designation-in-active/{id}', [App\Http\Controllers\Backend\DesignationController::class, 'inActive'])->name('designation-in-active');
Route::get('/designation-active/{id}', [App\Http\Controllers\Backend\DesignationController::class, 'active'])->name('designation-active');

/* Batch */
Route::get('/batch', [App\Http\Controllers\Backend\BatchController::class, 'index'])->name('batch');
Route::post('/batch-save-update', [App\Http\Controllers\Backend\BatchController::class, 'saveUpdate'])->name('batch-save-update');
Route::get('/batch-edit/{id}', [App\Http\Controllers\Backend\BatchController::class, 'edit'])->name('batch-edit');
Route::get('/batch-delete/{id}', [App\Http\Controllers\Backend\BatchController::class, 'delete'])->name('batch-delete');
Route::get('/batch-in-active/{id}', [App\Http\Controllers\Backend\BatchController::class, 'inActive'])->name('batch-in-active');
Route::get('/batch-active/{id}', [App\Http\Controllers\Backend\BatchController::class, 'active'])->name('batch-active');

/* Registration */
Route::get('/new-registration', [App\Http\Controllers\Backend\RegistrationController::class, 'index'])->name('new-registration');
Route::post('/registration-save-update', [App\Http\Controllers\Backend\RegistrationController::class, 'saveUpdate'])->name('registration-save-update');
Route::get('/registration-edit/{id}', [App\Http\Controllers\Backend\RegistrationController::class, 'edit'])->name('registration-edit');
Route::get('/registration-delete/{id}', [App\Http\Controllers\Backend\RegistrationController::class, 'delete'])->name('registration-delete');
Route::get('/registration-in-active/{id}', [App\Http\Controllers\Backend\RegistrationController::class, 'inActive'])->name('registration-in-active');
Route::get('/registration-active/{id}', [App\Http\Controllers\Backend\RegistrationController::class, 'active'])->name('registration-active');



/* Notice */
Route::get('/add-notice-event', [App\Http\Controllers\Backend\NoticeController::class, 'index'])->name('add-notice-event');
Route::post('/notice-save-update', [App\Http\Controllers\Backend\NoticeController::class, 'saveUpdate'])->name('notice-save-update');
Route::get('/notice-edit/{id}', [App\Http\Controllers\Backend\NoticeController::class, 'edit'])->name('notice-edit');
Route::get('/notice-delete/{id}', [App\Http\Controllers\Backend\NoticeController::class, 'delete'])->name('notice-delete');
Route::get('/notice-in-active/{id}', [App\Http\Controllers\Backend\NoticeController::class, 'inActive'])->name('notice-in-active');
Route::get('/notice-active/{id}', [App\Http\Controllers\Backend\NoticeController::class, 'active'])->name('notice-active');

Route::get('/send-sms', [App\Http\Controllers\Backend\SmsController::class, 'index'])->name('send-sms');
Route::POST('/sms-send-text', [App\Http\Controllers\Backend\SmsController::class, 'send_sms'])->name('sms-send-text');



/* FAQ */
Route::get('/add-faq', [App\Http\Controllers\Backend\FaqController::class, 'index'])->name('add-faq');
Route::post('/faq-save-update', [App\Http\Controllers\Backend\FaqController::class, 'saveUpdate'])->name('faq-save-update');
Route::get('/faq-edit/{id}', [App\Http\Controllers\Backend\FaqController::class, 'edit'])->name('faq-edit');
Route::get('/faq-delete/{id}', [App\Http\Controllers\Backend\FaqController::class, 'delete'])->name('faq-delete');
Route::get('/faq-in-active/{id}', [App\Http\Controllers\Backend\FaqController::class, 'inActive'])->name('faq-in-active');
Route::get('/faq-active/{id}', [App\Http\Controllers\Backend\FaqController::class, 'active'])->name('faq-active');

Route::get('/album', function () {
    return 'No album selected';
})->name('album.index');

Route::get('/create-album', [App\Http\Controllers\Backend\AlbumController::class, 'create'])->name('create-album');
Route::post('/album-save-update', [App\Http\Controllers\Backend\AlbumController::class, 'saveUpdate'])->name('album-save-update');

Route::get('/album-edit/{id}', [App\Http\Controllers\Backend\AlbumController::class, 'edit'])->name('album-edit');
Route::get('/album-delete/{id}', [App\Http\Controllers\Backend\AlbumController::class, 'delete'])->name('album-delete');
Route::get('/album-in-active/{id}', [App\Http\Controllers\Backend\AlbumController::class, 'inActive'])->name('album-in-active');
Route::get('/album-active/{id}', [App\Http\Controllers\Backend\AlbumController::class, 'active'])->name('album-active');


Route::get('/upload-image', [App\Http\Controllers\Backend\AlbumController::class, 'imageUpload'])->name('upload-image');
Route::get('/album/{id}', [App\Http\Controllers\Backend\AlbumController::class, 'show'])->name('album.show');
Route::post('/album/{id}/upload', [App\Http\Controllers\Backend\AlbumController::class, 'uploadImages'])->name('album.uploadImages');


//Route::get('/', function () {
////    try {
////        $dbconnect = DB::connection()->getPDO();
////        $dbname = DB::connection()->getDatabaseName();
////        echo "Connected successfully to the database. Database name is :".$dbname;
////    } catch(Exception $e) {
////        echo "Error in connecting to the database";
////    }
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
