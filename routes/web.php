<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('/')->group(function(){
    Route::prefix('/')->group(function(){
        Route::get('', [DashboardController::class, 'index']);
    });
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
});
