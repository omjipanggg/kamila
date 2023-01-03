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

Auth::routes();

// DASHBOARD
Route::any('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::get('data/{model}', [App\Http\Controllers\DashboardController::class, 'display'])->name('dashboard.display');
Route::get('data/{model}/create', [App\Http\Controllers\DashboardController::class, 'create'])->name('dashboard.create');
Route::post('data/{model}/store', [App\Http\Controllers\DashboardController::class, 'store'])->name('dashboard.store');
Route::get('data/{model}/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit'])->name('dashboard.edit');
Route::put('data/{model}/update/{id}', [App\Http\Controllers\DashboardController::class, 'update'])->name('dashboard.update');
Route::delete('data/{model}/delete/{id}', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('dashboard.destroy');

Route::get('faq', [App\Http\Controllers\DashboardController::class, 'faq'])->name('dashboard.faq');
Route::get('search', [App\Http\Controllers\DashboardController::class, 'search'])->name('dashboard.search');

// EMPLOYEE
Route::get('employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
Route::get('profile', [App\Http\Controllers\EmployeeController::class, 'profile'])->name('employee.profile');
Route::get('ring', [App\Http\Controllers\EmployeeController::class, 'ring'])->name('employee.ring');
Route::get('permit', [App\Http\Controllers\EmployeeController::class, 'permit'])->name('employee.permit');
Route::get('overtime', [App\Http\Controllers\EmployeeController::class, 'overtime'])->name('employee.overtime');
Route::get('patrol', [App\Http\Controllers\EmployeeController::class, 'patrol'])->name('employee.patrol');
Route::get('payslip', [App\Http\Controllers\EmployeeController::class, 'payslip'])->name('employee.payslip');

Route::post('check/in', [App\Http\Controllers\EmployeeController::class, 'arrive'])->name('employee.on');
Route::post('check/out', [App\Http\Controllers\EmployeeController::class, 'leave'])->name('employee.off');

// APPLICANT
Route::get('applicants', [App\Http\Controllers\ApplicantController::class, 'index'])->name('applicant.index');
Route::get('applicants/create', [App\Http\Controllers\ApplicantController::class, 'create'])->name('applicant.create');
Route::post('applicants/store', [App\Http\Controllers\ApplicantController::class, 'store'])->name('applicant.store');

// RECRUITMENT
Route::get('recruitment', [App\Http\Controllers\RecruitmentController::class, 'index'])->name('recruitment.index');
Route::get('recruitment/test', [App\Http\Controllers\RecruitmentController::class, 'test'])->name('recruitment.test');
Route::get('recruitment/score', [App\Http\Controllers\RecruitmentController::class, 'score'])->name('recruitment.score');

// CONTRACT
Route::get('contracts', [App\Http\Controllers\ContractController::class, 'index'])->name('contract.index');
Route::get('contracts/preview', [App\Http\Controllers\ContractController::class, 'preview'])->name('contract.preview');
Route::post('contracts/upload', [App\Http\Controllers\ContractController::class, 'upload'])->name('contract.upload');
Route::post('contracts/{id}/generate', [App\Http\Controllers\ContractController::class, 'generate'])->name('contract.generate');