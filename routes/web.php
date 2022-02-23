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

Route::group([], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home');
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    // Registration Routes...
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::resources([
        'doList' => \App\Http\Controllers\ToDoListController::class,
    ]);
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    });
});
