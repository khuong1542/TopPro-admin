<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\CategoriesController;
use Modules\Backend\Controllers\DashboardController;
use Modules\Backend\Controllers\ListController;
use Modules\Backend\Controllers\ListtypeController;
use Modules\Backend\Controllers\SupportController;

Route::prefix('/')->group(function(){
    // Dashboard
    Route::prefix('/')->group(function(){
        Route::get('', [DashboardController::class, 'index']);
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
    // Danh sách danh mục
    Route::prefix('listtype')->group(function(){
        Route::prefix('listtype')->group(function(){
            Route::get('/', [ListtypeController::class, 'index']);
            Route::get('loadList', [ListtypeController::class, 'loadList']);
            Route::get('create', [ListtypeController::class, 'create']);
            Route::get('edit', [ListtypeController::class, 'edit']);
            Route::post('update', [ListtypeController::class, 'update']);
            Route::post('delete', [ListtypeController::class, 'delete']);
            Route::post('updateOrderTable', [ListtypeController::class, 'updateOrderTable']);
            Route::post('changeStatus', [ListtypeController::class, 'changeStatus']);
        });
        Route::prefix('list')->group(function(){
            Route::get('/', [ListController::class, 'index']);
            Route::get('loadList', [ListController::class, 'loadList']);
            Route::post('create', [ListController::class, 'create']);
            Route::get('edit', [ListController::class, 'edit']);
            Route::post('update', [ListController::class, 'update']);
            Route::post('delete', [ListController::class, 'delete']);
            Route::post('updateOrderTable', [ListController::class, 'updateOrderTable']);
            Route::post('changeStatus', [ListController::class, 'changeStatus']); 
        });
    });
    // Chuyên mục
    Route::prefix('categories')->group(function(){
        Route::get('', [CategoriesController::class, 'index']);
        Route::get('loadList', [CategoriesController::class, 'loadList']);
        Route::get('create', [CategoriesController::class, 'create']);
        Route::post('addList', [CategoriesController::class, 'addList']);
    });
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    Route::prefix('support')->group(function(){
        Route::get('/', [SupportController::class, 'index']);
        Route::post('updateData', [SupportController::class, 'updateData']); 
    });
});
