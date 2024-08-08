<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function(){
    Route::post('/logup', 'logup')->name('logup');
    Route::post('/login', 'login')->name('login');
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', 'logout')->name('logout');
    });
});


Route::controller(HolidayController::class)->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('holiday/all', 'all')->name('all');
    });
});

Route::controller(UsersController::class)->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('user/all', 'all')->name('all');
    });
});
