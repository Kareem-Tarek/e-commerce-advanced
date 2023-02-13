<?php
//Start Dashboard Controllers
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

//-------------------------------------- START Website Routes --------------------------------------//
Route::group([], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::get('/error-404', [ErrorsController::class, 'index'])->name('error-404');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

/********************** Start contact us routes. **********************/
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {
    Route::get('/all-contact-us', [ContactUsController::class, 'index'])->name('all-contact-us');   //contact us page "index" for dashboard
    Route::delete('/contact-us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');   //delete functionality "destroy" for dashboard
})->prefix('dashboard');

Route::group([
    'middleware' => ['if_admin_or_moderator_redirect_back']
], function () {
    Route::get('/contact-us', [ContactUsController::class, 'create'])->name('contact-us');   //contact us page for website
    Route::post('/contact-us/{id}', [ContactUsController::class, 'store'])->name('contact-us.store');
});
/********************** Start contact us routes. **********************/

Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming-soon');
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

        /********************** Start products routes. **********************/
        Route::resource('/products', DashboardFinalProductController::class)->except(['index']);
        //this route replaces the "index" function from "DashboardFinalProductController"//
        Route::get('/all-products/{id}/{name?}', [DashboardFinalProductController::class, 'index_for_each_product'])->name('final_products.index');
        //////////////////////////////////////////////////////////////////////////////////

        Route::get('/all-products', [DashboardProductDetailController::class, 'index_general_for_products'])->name('products_details.index');
        /********************** End products routes. **********************/

        /********************** Start categories routes. **********************/
        Route::resource('/categories', DashboardCategoryController::class);
        Route::get('/category/delete', [DashboardCategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}/', [DashboardCategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forceDelete/{id}/', [DashboardCategoryController::class, 'forceDelete'])->name('categories.forceDelete');
        /********************** End categories routes. **********************/

        /********************** Start sub-categories routes. **********************/
        Route::resource('/subcategories', DashboardSubCategoryController::class);
        Route::get('/subcategory/delete', [DashboardSubCategoryController::class, 'delete'])->name('subcategories.delete');
        Route::get('/subcategory/restore/{id}/', [DashboardSubCategoryController::class, 'restore'])->name('subcategories.restore');
        Route::delete('/subcategory/forceDelete/{id}/', [DashboardSubCategoryController::class, 'forceDelete'])->name('subcategories.forceDelete');
        /********************** End sub-categories routes. **********************/
    });

});
//-------------------------------------- END Dashboard Routes --------------------------------------//
