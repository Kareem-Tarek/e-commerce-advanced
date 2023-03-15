<?php
//Start Dashboard Controllers
use App\Http\Controllers\Auth\DashboardLoginController;
use App\Http\Controllers\Dashboard\DashboardUserController;
use App\Http\Controllers\Dashboard\DashboardSettingController;
use App\Http\Controllers\Dashboard\DashboardHomeController;
use App\Http\Controllers\Dashboard\DashboardCategoryController;
use App\Http\Controllers\Dashboard\DashboardSubCategoryController;
use App\Http\Controllers\Dashboard\DashboardProductDetailController;
use App\Http\Controllers\Dashboard\DashboardFinalProductController;
//End Dashboard Controllers

//Start Website Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ErrorsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProductController;
//End Website Controllers

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/dashboard/login', [DashboardLoginController::class, 'index'])->name('dashboard.login');


//-------------------------------------- START Website Routes --------------------------------------//
Route::group([], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::get('/error-404', [ErrorsController::class, 'index'])->name('error-404');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

/********************** Start users' (auth()->user()) profile routes. **********************/
Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/my-profile', [UserProfileController::class, 'edit_my_profile'])->name('profile-management');
    Route::patch('/my-profile/update', [UserProfileController::class, 'update_my_profile'])->name('update-my-profile');
});
/********************** End users' (auth()->user()) profile routes. **********************/

/********************** Start contact us routes. **********************/
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/contact-us', [ContactUsController::class, 'index_for_all_contact_us_info'])->name('contact-us.index');   //all contact us info page "index" - for dashboard
        Route::get('/contact-us/registered-users', [ContactUsController::class, 'registered_users_contact_us_info'])->name('registered-users-contact-us-info');   //registered users contact us info page - for dashboard
        Route::get('/contact-us/customers', [ContactUsController::class, 'customers_contact_us_info'])->name('customers-contact-us-info');   //customers contact us info page - for dashboard
        Route::get('/contact-us/suppliers', [ContactUsController::class, 'suppliers_contact_us_info'])->name('suppliers-contact-us-info');   //suppliers contact us info page - for dashboard
        Route::get('/contact-us/unregistered-users', [ContactUsController::class, 'unregistered_users_contact_us_info'])->name('unregistered-users-contact-us-info');   //unregistered users contact us info page - for dashboard
        Route::delete('/contact-us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');   //contact us info delete functionality "destroy" for dashboard (without softDelete!)
        /***** Start excel routes for contact us "customers" (view & export functionality) *****/
        Route::get('/contact-us/customers/excel-export', [ContactUsController::class, 'ExportViewContactUsCustomers'])->name('export-view-contact-us-customers');
        Route::get('/contact-us/customers/export', [ContactUsController::class, 'exportContactUsCustomers'])->name('export-contact-us-customers');
        /***** End excel routes for contact us "customers" (view & export functionality) *****/
    });
});

Route::group([
    'middleware' => ['if_admin_or_moderator_redirect_back']
], function () {
    Route::get('/contact-us', [ContactUsController::class, 'create'])->name('contact-us');   //contact us page - for website
    // Route::get('/my-sent-contact-us-forms', [ContactUsController::class, 'contact_us_info_for_each_sender'])->name('my-sent-contact-us-forms');
    Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('contact-us.store');
});
/********************** Start contact us routes. **********************/

Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming-soon');

/********************** Start products routes. **********************/
Route::get('/search', [ProductController::class, 'website_search'])->name('website-search-query');
/********************** End products routes. **********************/
//-------------------------------------- END Website Routes --------------------------------------//




//-------------------------------------- START Dashboard Routes --------------------------------------//
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::group([], function () {    //group function for dashboard "home" route (same route name "dashboard")
            Route::get('/home', [DashboardHomeController::class, 'index'])->name('dashboard');
            Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard');
        });

        /********************** Start settings routes. **********************/
        Route::resource('/settings', DashboardSettingController::class);
        /********************** End settings routes. **********************/

        /********************** Start products routes. **********************/
        Route::resource('/all-products', DashboardProductDetailController::class);
        Route::get('/all-products-with-discounts', [DashboardProductDetailController::class, 'index_with_discounts'])->name('all-products.index-with-discounts');//index of products (with discounts)
        Route::get('/all-products-without-discounts', [DashboardProductDetailController::class, 'index_without_discounts'])->name('all-products.index-without-discounts');//index of products (without discounts)
        Route::get('/all-product/delete', [DashboardProductDetailController::class, 'delete'])->name('all-products.delete');
        Route::get('/all-product/restore/{id}/', [DashboardProductDetailController::class, 'restore'])->name('all-products.restore');
        Route::delete('/all-product/forceDelete/{id}/', [DashboardProductDetailController::class, 'forceDelete'])->name('all-products.forceDelete');

        
        Route::resource('/products', DashboardFinalProductController::class)->except(['index']);
        //this route replaces the "index" function from "DashboardFinalProductController"//
        Route::get('/all-products/{id}/{name?}', [DashboardFinalProductController::class, 'index_for_each_product'])->name('final_products.index'); //index of products of products
        //////////////////////////////////////////////////////////////////////////////////
        Route::get('/product/delete', [DashboardFinalProductController::class, 'delete'])->name('products.delete');
        Route::get('/product/restore/{id}/', [DashboardFinalProductController::class, 'restore'])->name('products.restore');
        Route::delete('/product/forceDelete/{id}/', [DashboardFinalProductController::class, 'forceDelete'])->name('products.forceDelete');

        /********************** End products routes. **********************/

        /********************** Start categories routes. **********************/
        Route::resource('/categories', DashboardCategoryController::class);
        Route::get('/category/delete', [DashboardCategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}/', [DashboardCategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forceDelete/{id}/', [DashboardCategoryController::class, 'forceDelete'])->name('categories.forceDelete');
        /***** Start excel routes for categories (view, import & export functionalities) *****/
        Route::get('/category/excel-import-export', [DashboardCategoryController::class,'importExportViewCategories'])->name('import-export-view-categories');
        Route::post('/category/import', [DashboardCategoryController::class,'importCategories'])->name('import-categories');
        Route::get('/category/export', [DashboardCategoryController::class,'exportCategories'])->name('export-categories');
        /***** End excel routes for categories (view, import & export functionalities) *****/
        /********************** End categories routes. **********************/

        /********************** Start sub-categories routes. **********************/
        Route::resource('/subcategories', DashboardSubCategoryController::class);
        Route::get('/subcategory/delete', [DashboardSubCategoryController::class, 'delete'])->name('subcategories.delete');
        Route::get('/subcategory/restore/{id}/', [DashboardSubCategoryController::class, 'restore'])->name('subcategories.restore');
        Route::delete('/subcategory/forceDelete/{id}/', [DashboardSubCategoryController::class, 'forceDelete'])->name('subcategories.forceDelete');
        /***** Start excel routes for sub-categories (view, import & export functionalities) *****/
        Route::get('/subcategory/excel-import-export', [DashboardSubCategoryController::class,'importExportViewSubCategories'])->name('import-export-view-sub-categories');
        Route::post('/subcategory/import', [DashboardSubCategoryController::class,'importSubCategories'])->name('import-sub-categories');
        Route::get('/subcategory/export', [DashboardSubCategoryController::class,'exportSubCategories'])->name('export-sub-categories');
        /***** End excel routes for sub-categories (view, import & export functionalities) *****/
        /********************** End sub-categories routes. **********************/

        /********************** Start users routes. **********************/
        Route::resource('/users', DashboardUserController::class);
        //***** Start change account password *****//
        Route::get('/user/change-password-view/{id}/{name?}', [DashboardUserController::class, 'changePasswordView'])->name('users.changePasswordView');
        Route::patch('/user/change-password/{id}', [DashboardUserController::class, 'changePassword'])->name('users.changePassword');
        //***** End change account password *****//
        //***** Start account deletion *****//
        Route::get('/user/delete-account-view/{id}/{name?}', [DashboardUserController::class, 'deleteAccountView'])->name('users.deleteAccountView');
        Route::delete('/user/delete-account/{id}', [DashboardUserController::class, 'deleteAccount'])->name('users.deleteAccount');
        //***** End account deletion *****//
        //***** Start account deactivation *****//
        Route::get('/user/deactivate-account-view/{id}/{name?}', [DashboardUserController::class, 'deactivateAccountView'])->name('users.deactivateAccountView');
        Route::patch('/user/deactivate-account/{id}', [DashboardUserController::class, 'deactivateAccount'])->name('users.deactivateAccount');
        // End account deactivation //
        Route::get('/user/admins', [DashboardUserController::class, 'indexAdmins'])->name('users.indexAdmins');
        Route::get('/user/moderators', [DashboardUserController::class, 'indexModerators'])->name('users.indexModerators');
        Route::get('/user/suppliers', [DashboardUserController::class, 'indexSuppliers'])->name('users.indexSuppliers');
        Route::get('/user/customers', [DashboardUserController::class, 'indexCustomers'])->name('users.indexCustomers');
        Route::get('/user/active-users', [DashboardUserController::class, 'indexActiveUsers'])->name('users.indexActiveUsers');
        Route::get('/user/inactive-users', [DashboardUserController::class, 'indexInactiveUsers'])->name('users.indexInactiveUsers');
        Route::get('/user/blocked-users', [DashboardUserController::class, 'indexBlockedUsers'])->name('users.indexBlockedUsers');
        Route::get('/user/delete', [DashboardUserController::class, 'delete'])->name('users.delete');
        Route::get('/user/restore/{id}/', [DashboardUserController::class, 'restore'])->name('users.restore');
        Route::delete('/user/forceDelete/{id}/', [DashboardUserController::class, 'forceDelete'])->name('users.forceDelete');
        /***** Start excel routes for users (view, import & export functionalities) *****/
        Route::get('/user/excel-import-export', [DashboardUserController::class,'importExportViewUsers'])->name('import-export-view-users');
        Route::post('/user/import', [DashboardUserController::class,'importUsers'])->name('import-users');
        Route::get('/user/export', [DashboardUserController::class,'exportUsers'])->name('export-users');
        /***** End excel routes for users (view, import & export functionalities) *****/
        /********************** End users routes. **********************/
    });
});
//-------------------------------------- END Dashboard Routes --------------------------------------//
