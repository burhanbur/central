<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\ApplicationController;
use App\Http\Controllers\Web\ApprovalController;
use App\Http\Controllers\Web\ForgotPasswordController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\OrganizationController;
use App\Http\Controllers\Web\PositionController;
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
	Route::group(['middleware' => ['role:user']], function() {		
		Route::get('approvals/list', [ApprovalController::class, 'listApproval'])->name('list.approval');
		Route::put('approvals', [ApprovalController::class, 'approval'])->name('approval');

		Route::get('applications/user', [ApplicationController::class, 'myApplication'])->name('user.application');
	});

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

		Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
		Route::get('permissions/{id}', [PermissionController::class, 'show'])->name('show.permission');
		Route::get('permissions/edit/{id}', [PermissionController::class, 'edit'])->name('edit.permission');
		Route::post('permissions', [PermissionController::class, 'store'])->name('store.permission');
		Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('update.permission');
		Route::delete('permissions/{id}', [PermissionController::class, 'destroy'])->name('delete.permission');	

		Route::get('roles', [RoleController::class, 'index'])->name('roles');
		Route::get('roles/{id}', [RoleController::class, 'show'])->name('show.role');
		Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('edit.role');
		Route::post('roles', [RoleController::class, 'store'])->name('store.role');
		Route::put('roles/{id}', [RoleController::class, 'update'])->name('update.role');
		Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('delete.role');

		Route::get('approvals', [ApprovalController::class, 'index'])->name('approvals');
		Route::get('approvals/{id}', [ApprovalController::class, 'show'])->name('show.approval');
		Route::get('approvals/edit/{id}', [ApprovalController::class, 'edit'])->name('edit.approval');
		Route::post('approvals', [ApprovalController::class, 'store'])->name('store.approval');
		Route::put('approvals/{id}', [ApprovalController::class, 'update'])->name('update.approval');
		Route::delete('approvals/{id}', [ApprovalController::class, 'destroy'])->name('delete.approval');		

		Route::get('employees', [EmployeeController::class, 'index'])->name('employees');
		Route::get('employees/{id}', [EmployeeController::class, 'show'])->name('show.employee');
		Route::get('employees/edit/{id}', [EmployeeController::class, 'edit'])->name('edit.employee');
		Route::post('employees', [EmployeeController::class, 'store'])->name('store.employee');
		Route::put('employees/{id}', [EmployeeController::class, 'update'])->name('update.employee');
		Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('delete.employee');

		Route::get('organizations', [OrganizationController::class, 'index'])->name('organizations');
		Route::get('organizations/{id}', [OrganizationController::class, 'show'])->name('show.organization');
		Route::get('organizations/edit/{id}', [OrganizationController::class, 'edit'])->name('edit.organization');
		Route::post('organizations', [OrganizationController::class, 'store'])->name('store.organization');
		Route::put('organizations/{id}', [OrganizationController::class, 'update'])->name('update.organization');
		Route::delete('organizations/{id}', [OrganizationController::class, 'destroy'])->name('delete.organization');	

		Route::get('positions', [PositionController::class, 'index'])->name('positions');
		Route::get('positions/{id}', [PositionController::class, 'show'])->name('show.position');
		Route::get('positions/edit/{id}', [PositionController::class, 'edit'])->name('edit.position');
		Route::post('positions', [PositionController::class, 'store'])->name('store.position');
		Route::put('positions/{id}', [PositionController::class, 'update'])->name('update.position');
		Route::delete('positions/{id}', [PositionController::class, 'destroy'])->name('delete.position');
	});

	Route::get('/', [HomeController::class, 'index']);
	Route::get('home', [HomeController::class, 'index'])->name('home');

	Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});