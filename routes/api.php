<?php

use App\Http\Controllers\TodoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('todo/')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('all', [TodoController::class, 'index'])->name('index');
        Route::post('create', [TodoController::class, 'create'])->name('create');
        Route::put('{id}', [TodoController::class, 'update'])->name('update');
        Route::delete('{id}', [TodoController::class, 'oneDelete'])->name('oneDelete');
    });
});
