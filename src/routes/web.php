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

Route::get('login', [App\Http\Controllers\Web\LoginController::class, 'showLoginForm']);
Route::post('login', [App\Http\Controllers\Web\LoginController::class, 'login'])->name('login');

Route::post('password/email', [App\Http\Controllers\Web\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [App\Http\Controllers\Web\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('password/reset', [App\Http\Controllers\Web\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('password/reset/{token}', [App\Http\Controllers\Web\ResetPasswordController::class, 'showResetForm'])->name('password.reset');


Route::group(['middleware' => ['auth']], function() {
	Route::group(['middleware' => ['role:super_admin']], function() {

	});

	Route::group(['middleware' => ['role:admin_app']], function() {

	});
	
	Route::group(['middleware' => ['role:user']], function() {

	});

	Route::post('logout', [App\Http\Controllers\Web\LoginController::class, 'logout'])->name('logout');
});