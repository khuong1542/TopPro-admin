<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\CategoriesController;
use Modules\Backend\Controllers\DashboardController;
use Modules\Backend\Controllers\ListController;
use Modules\Backend\Controllers\ListtypeController;

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
    Route::prefix('listtype')->group(function(){
        Route::prefix('listtype')->group(function(){
            Route::get('/', [ListtypeController::class, 'index']);
            Route::get('create', [ListtypeController::class, 'create']);
            Route::get('edit', [ListtypeController::class, 'edit']);
            Route::get('update', [ListtypeController::class, 'update']);
            Route::get('delete', [ListtypeController::class, 'delete']);
            Route::get('changeStatus', [ListtypeController::class, 'changeStatus']);
        });
        Route::prefix('list')->group(function(){
            Route::get('/', [ListController::class, 'index']);
            Route::get('create', [ListController::class, 'create']);
            Route::get('edit', [ListController::class, 'edit']);
            Route::get('update', [ListController::class, 'update']);
            Route::get('delete', [ListController::class, 'delete']);
            Route::get('changeStatus', [ListController::class, 'changeStatus']); 
        });
    });
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
});
