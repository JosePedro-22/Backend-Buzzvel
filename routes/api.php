<?php

use App\Http\Controllers\HolidayPlanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeedController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/seed', [SeedController::class, 'seed']);

Route::middleware('auth:api')->group(callback: function () {

    Route::get('/', [HolidayPlanController::class, 'index']);
    Route::post('/holiday-plans/', [HolidayPlanController::class, 'store']);
    Route::get('/holiday-plans/{id}',[HolidayPlanController::class, 'show']);
    Route::post('/holiday-plans/{id}', [HolidayPlanController::class, 'update']);
    Route::post('/holiday-plans/{id}', [HolidayPlanController::class, 'destroy']);
    Route::get('/holiday-plans/{holidayPlan}/generate-pdf', [HolidayPlanController::class, 'generatePDF']);
});
