<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BidsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CitiesController;

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

Route::name('admin.')->group(function () {

    Route::middleware(['auth:web'])->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource('city', CitiesController::class);
        Route::resource('tour', ToursController::class);
        Route::resource('user', UsersController::class);
        
        Route::prefix('bid')->name('bid.')->group(function () {

            Route::get('/', [BidsController::class, 'index'])->name('index');
            Route::get('/{bid}/show', [BidsController::class, 'show'])->name('show');
            Route::get('/{bid}/process', [BidsController::class, 'process'])->name('process');
            Route::get('/{bid}/destroy', [BidsController::class, 'destroy'])->name('destroy');
        });
    });
});

Auth::routes();
