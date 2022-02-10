<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminActivitiesController;
use App\Http\Controllers\EstimatorController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\WatchHistoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/get_online_status', [App\Http\Controllers\HomeController::class, 'get_online_status'])->name('home.get_online_status');

    //Admin Acivities 
    Route::get('/getactivities', [AdminActivitiesController::class, 'index'])->name('getactivities');

});

//Estimator
Route::prefix('/estimator')->group(function (){
    Route::get('/', [EstimatorController::class, 'index'])->name('estimator.index');
    Route::post('/store', [EstimatorController::class, 'store'])->name('estimator.store');
    Route::post('/update', [EstimatorController::class, 'update'])->name('estimator.update');
});

//Watch history
Route::prefix('/watch-history')->group(function (){
    Route::get('/', [WatchHistoryController::class, 'index'])->name('watch-history.index');
});

//General Settings
Route::prefix('/general-settings')->group(function (){
    Route::get('/show/{id?}', [GeneralSettingsController::class, 'show'])->name('general-settings.show');
    Route::post('/update/{id?}', [GeneralSettingsController::class, 'update'])->name('general-settings.update');
});