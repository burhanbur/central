<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\ApplicationController;
use App\Http\Controllers\Web\ApprovalController;
use App\Http\Controllers\Web\ForgotPasswordController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\PrivilegeController;
use App\Http\Controllers\Web\ResetPasswordController;
use App\Http\Controllers\Web\UserController;

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

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::group(['middleware' => ['auth']], function() {
	Route::group(['middleware' => ['role:admin']], function() {
		Route::get('users', [UserController::class, 'index'])->name('users');
		Route::get('users/{id}', [UserController::class, 'show'])->name('show.user');
		Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('edit.user');
		Route::post('users', [UserController::class, 'store'])->name('store.user');
		Route::put('users/{id}', [UserController::class, 'update'])->name('update.user');
		Route::delete('users/{id}', [UserController::class, 'destroy'])->name('delete.user');

		Route::get('applications', [ApplicationController::class, 'index'])->name('applications');
		Route::get('applications/{id}', [ApplicationController::class, 'show'])->name('show.application');
		Route::get('applications/edit/{id}', [ApplicationController::class, 'edit'])->name('edit.application');
		Route::post('applications', [ApplicationController::class, 'store'])->name('store.application');
		Route::put('applications/{id}', [ApplicationController::class, 'update'])->name('update.application');
		Route::delete('applications/{id}', [ApplicationController::class, 'destroy'])->name('delete.application');

		Route::get('privileges', [PrivilegeController::class, 'index'])->name('privileges');
		Route::get('privileges/{id}', [PrivilegeController::class, 'show'])->name('show.privilege');
		Route::get('privileges/edit/{id}', [PrivilegeController::class, 'edit'])->name('edit.privilege');
		Route::post('privileges', [PrivilegeController::class, 'store'])->name('store.privilege');
		Route::put('privileges/{id}', [PrivilegeController::class, 'update'])->name('update.privilege');
		Route::delete('privileges/{id}', [PrivilegeController::class, 'destroy'])->name('delete.privilege');

		Route::get('approvals', [ApprovalController::class, 'index'])->name('approvals');
		Route::get('approvals/{id}', [ApprovalController::class, 'show'])->name('show.approval');
		Route::get('approvals/edit/{id}', [ApprovalController::class, 'edit'])->name('edit.approval');
		Route::post('approvals', [ApprovalController::class, 'store'])->name('store.approval');
		Route::put('approvals/{id}', [ApprovalController::class, 'update'])->name('update.approval');
		Route::delete('approvals/{id}', [ApprovalController::class, 'destroy'])->name('delete.approval');
	});
	
	Route::group(['middleware' => ['role:user']], function() {

	});

	Route::get('/', [HomeController::class, 'index']);
	Route::get('home', [HomeController::class, 'index'])->name('home');

	Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});