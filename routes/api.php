<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParticipantsController;
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
        Route::get('/holiday/all', 'getAllHolidays')->name('getAllHolidays');
        Route::post('/holiday/createHoliday', 'createHoliday')->name('createHoliday');
    });
});

Route::controller(UsersController::class)->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/user/all', 'all')->name('all');
    });
});

Route::controller(ParticipantsController::class)->group(function(){
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/participants/new', 'createParticipant')->name('createParticipant');
    });
});
