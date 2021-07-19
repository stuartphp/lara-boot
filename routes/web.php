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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('selection/{id}', [App\Http\Controllers\HomeController::class, 'selection'])->name('selection');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('user-profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('user-profile');

Route::prefix('users')->as('users.')->group(function () {
    Route::get('/users', [App\Http\Controllers\Admin\Users\UserManagerController::class, 'users'])->name('users');
    Route::get('/permissions', [App\Http\Controllers\Admin\Users\UserManagerController::class, 'permission'])->name('permissions');
});

