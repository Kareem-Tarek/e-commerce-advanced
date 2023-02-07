<?php
//Start Dashboard Controllers
use App\Http\Controllers\Dashboard\DashboardHomeController;
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

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

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
        Route::get('/all-products/{id}/{name?}', [DashboardFinalProductController::class, 'index_for_each_product'])->name('final_products.index');

        Route::get('/all-products', [DashboardProductDetailController::class, 'index_general_for_products'])->name('products_details.index');
        /********************** End products routes. **********************/
    });

});
//-------------------------------------- END Dashboard Routes --------------------------------------//
