<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\CategoriesController;
use Modules\Backend\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('/')->group(function(){
    Route::prefix('/')->group(function(){
        Route::get('', [DashboardController::class, 'index']);
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
    Route::prefix('/categories')->group(function(){
        Route::get('', [CategoriesController::class, 'index']);
        Route::get('create', [CategoriesController::class, 'create']);
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
