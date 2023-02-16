<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SpecController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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
    return view('guest.home');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('doctors', DoctorController::class);
        Route::resource('specializations', SpecController::class)->except(['show','edit','create']);
        Route::resource('offers', OfferController::class)->except(['show']);
        Route::resource('messages', MessageController::class)->except(['show','edit']);
        Route::resource('ratings', RatingController::class)->except(['show','edit']);
        Route::resource('reviews', ReviewController::class)->except(['show','edit']);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('{any?}', function(){
    return view('guest.home');
})->where('any','.*')->name('home');
