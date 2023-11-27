<?php

use Illuminate\Support\Facades\Route;
use Modules\Api\Controllers\BlogsController;
use Modules\Api\Controllers\RegisterController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [RegisterController::class, 'register']);

Route::prefix('blogs')->group(function(){
    Route::get('loadList', [BlogsController::class, 'loadList']);
    Route::get('reader', [BlogsController::class, 'reader']);
});
