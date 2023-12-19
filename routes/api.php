<?php

use Illuminate\Support\Facades\Route;
use Modules\Api\Controllers\BlogsController;
use Modules\Api\Controllers\AuthController;
use Modules\Api\Controllers\HomeController;

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

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('update', [AuthController::class, 'update']);
    Route::post('uploads', [AuthController::class, 'uploads']);
    Route::prefix('infor')->group(function() {
        Route::post('changepass', [AuthController::class, 'changepass']);
    });
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::prefix('home')->group(function() {
    Route::post('blogs', [HomeController::class, 'blogs']);
});

Route::prefix('blogs')->group(function(){
    Route::get('loadList', [BlogsController::class, 'loadList']);
    Route::post('list', [BlogsController::class, 'list']);
    Route::get('reader', [BlogsController::class, 'reader']);
});
