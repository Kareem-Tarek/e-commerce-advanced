<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ErrorsController;

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

//-------------------------------------- END Website Routes --------------------------------------//


//-------------------------------------- START Dashboard Routes --------------------------------------//
Route::group([ 'middleware' => ['dashboard', 'auth'] ], function () {
    Route::prefix('dashboard')->group([], function(){
        //routes.......
    });
});
//-------------------------------------- END Dashboard Routes --------------------------------------//
