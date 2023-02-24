<?php

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\SpecController;
use App\Http\Controllers\MessageLeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
    ->prefix('doctors')
    ->group(function () {
        Route::get('/', [DoctorController::class, 'index']);
        Route::get("/{spec}", [DoctorController::class, "filterDoctors"]);
    });

Route::post('/contacts', [MessageLeadController::class, 'store']);

Route::get("/specs", [SpecController::class, "getSpecs"]);


