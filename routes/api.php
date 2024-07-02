<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultantController;
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

/*Route::apiResource('consultants', ConsultantController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('appointments', AppointmentController::class);*/

// مسیرهای مربوط به مشاوران
Route::prefix('consultants')->group(function () {
    Route::get('/', [ConsultantController::class, 'index']);
    Route::get('/show/{consultant}', [ConsultantController::class, 'show']);
    Route::post('/store', [ConsultantController::class, 'store']);
    Route::put('/update/{consultant}', [ConsultantController::class, 'update']);
    Route::delete('/destroy/{consultant}', [ConsultantController::class, 'destroy']);
});


// مسیرهای مربوط به مراجعین
Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/show/{client}', [ClientController::class, 'show']);
    Route::post('/store', [ClientController::class, 'store']);
    Route::put('/update/{client}', [ClientController::class, 'update']);
    Route::delete('/destroy/{client}', [ClientController::class, 'destroy']);
});

// مسیرهای مربوط به نوبت‌ها
Route::prefix('appointments')->group(function () {
    Route::get('/', [AppointmentController::class, 'index']);
    Route::get('/show/{appointment}', [AppointmentController::class, 'show']);
    Route::post('/store', [AppointmentController::class, 'store']);
    Route::put('/update/{appointment}', [AppointmentController::class, 'update']);
    Route::delete('/destroy/{appointment}', [AppointmentController::class, 'destroy']);
});
