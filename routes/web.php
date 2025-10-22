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
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index']);
//Route::get('/', [App\Http\Controllers\FrontendHomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');


//Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
//Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);
//
//Route::get('auth/facebook', [LoginWithFacebookController::class, 'redirectFacebook']);
//Route::get('callback/facebook', [LoginWithFacebookController::class, 'facebookCallback']);


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

/* Supplier section */
Route::get('/supplier', [App\Http\Controllers\Backend\SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier-save-update', [App\Http\Controllers\Backend\SupplierController::class, 'saveUpdate'])->name('supplier-save-update');
Route::get('/supplier-edit/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'edit']);
Route::get('/supplier-delete/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'delete'])->name('supplier-delete');
Route::get('/supplier-in-active/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'inActive'])->name('supplier-in-active');
Route::get('/supplier-active/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'active'])->name('supplier-active');

/* customer membership section */
Route::get('/customer', [App\Http\Controllers\Backend\CustomerController::class, 'index'])->name('customer');
Route::post('/customer-save-update', [App\Http\Controllers\Backend\CustomerController::class, 'saveUpdate'])->name('customer-save-update');
Route::get('/customer-edit/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'edit']);
Route::get('/customer-delete/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'delete'])->name('customer-delete');
Route::get('/customer-in-active/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'inActive'])->name('customer-in-active');
Route::get('/customer-active/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'active'])->name('customer-active');

/* Supplier section */
Route::get('/supplier-payment', [App\Http\Controllers\Backend\SupplierPaymentController::class, 'index'])->name('supplier-payment');
Route::post('/supplier-payment-save-update', [App\Http\Controllers\Backend\SupplierPaymentController::class, 'saveUpdate'])->name('supplier-payment-save-update');
Route::get('/supplier-payment-edit/{id}', [App\Http\Controllers\Backend\SupplierPaymentController::class, 'edit']);
Route::get('/supplier-payment-delete/{id}', [App\Http\Controllers\Backend\SupplierPaymentController::class, 'delete'])->name('supplier-payment-delete');
Route::get('/supplier-payment-in-active/{id}', [App\Http\Controllers\Backend\SupplierPaymentController::class, 'inActive'])->name('supplier-payment-in-active');
Route::get('/supplier-payment-active/{id}', [App\Http\Controllers\Backend\SupplierPaymentController::class, 'active'])->name('supplier-payment-active');

/* Payment section */
Route::get('/customer-payment', [App\Http\Controllers\Backend\CustomerPaymentController::class, 'index'])->name('customer-payment');
Route::post('/customer-payment-save-update', [App\Http\Controllers\Backend\CustomerPaymentController::class, 'saveUpdate'])->name('customer-payment-save-update');
Route::get('/customer-payment-edit/{id}', [App\Http\Controllers\Backend\CustomerPaymentController::class, 'edit']);
Route::get('/customer-payment-delete/{id}', [App\Http\Controllers\Backend\CustomerPaymentController::class, 'delete'])->name('customer-payment-delete');
Route::get('/customer-payment-in-active/{id}', [App\Http\Controllers\Backend\CustomerPaymentController::class, 'inActive'])->name('customer-payment-in-active');
Route::get('/customer-payment-active/{id}', [App\Http\Controllers\Backend\CustomerPaymentController::class, 'active'])->name('customer-payment-active');

/* Order Payment section */
Route::get('/payment-order', [App\Http\Controllers\Backend\PaymentOrderController::class, 'index'])->name('payment-order');
Route::post('/payment-order-save-update', [App\Http\Controllers\Backend\PaymentOrderController::class, 'saveUpdate'])->name('payment-order-save-update');
Route::get('/payment-order-edit/{id}', [App\Http\Controllers\Backend\PaymentOrderController::class, 'edit']);
Route::get('/payment-order-delete/{id}', [App\Http\Controllers\Backend\PaymentOrderController::class, 'delete'])->name('payment-order-delete');
Route::get('/payment-order-in-active/{id}', [App\Http\Controllers\Backend\PaymentOrderController::class, 'inActive'])->name('payment-order-in-active');
Route::get('/payment-order-active/{id}', [App\Http\Controllers\Backend\PaymentOrderController::class, 'active'])->name('payment-order-active');

/* Reports */
Route::get('/customer-payment-reports', [App\Http\Controllers\Backend\PaymentReportsController::class, 'customerReports'])->name('customer-payment-reports');

/* Rate setup section */
Route::get('/add-rate', [App\Http\Controllers\Backend\RateController::class, 'index'])->name('add-rate');
Route::post('/rate-save-update', [App\Http\Controllers\Backend\RateController::class, 'saveUpdate'])->name('rate-save-update');
Route::get('/rate-edit/{id}', [App\Http\Controllers\Backend\RateController::class, 'edit']);
Route::get('/rate-delete/{id}', [App\Http\Controllers\Backend\RateController::class, 'delete'])->name('rate-delete');
Route::get('/rate-in-active/{id}', [App\Http\Controllers\Backend\RateController::class, 'inActive'])->name('rate-in-active');
Route::get('/rate-active/{id}', [App\Http\Controllers\Backend\RateController::class, 'active'])->name('rate-active');

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


/* logo section */
Route::get('/logo', [App\Http\Controllers\Backend\LogoController::class, 'index'])->name('logo');
Route::post('/logo-save-update', [App\Http\Controllers\Backend\LogoController::class, 'saveUpdate'])->name('logo-save-update');
Route::get('/logo-edit/{id}', [App\Http\Controllers\Backend\LogoController::class, 'edit']);
Route::get('/logo-delete/{id}', [App\Http\Controllers\Backend\LogoController::class, 'delete'])->name('logo-delete');
Route::get('/logo-in-active/{id}', [App\Http\Controllers\Backend\LogoController::class, 'inActive'])->name('logo-in-active');
Route::get('/logo-active/{id}', [App\Http\Controllers\Backend\LogoController::class, 'active'])->name('logo-active');




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

Route::get('/send-sms', [App\Http\Controllers\Backend\SmsController::class, 'index'])->name('send-sms');
Route::POST('/sms-send-text', [App\Http\Controllers\Backend\SmsController::class, 'send_sms'])->name('sms-send-text');



