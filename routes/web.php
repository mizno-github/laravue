<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('list');
});

Route::get('/error', function () {
    return 'not login';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');

Route::prefix('design/')->group(function () {
    Route::view('modal', 'design/modal')->name('design.modal');
    Route::view('tabMenu', 'design/tabMenu')->name('design.tabMenu');
    Route::view('sideMenu', 'design/sideMenu')->name('design.sideMenu');
});
