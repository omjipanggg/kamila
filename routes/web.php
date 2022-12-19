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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('data/{id}', [App\Http\Controllers\DashboardController::class, 'display'])->name('dashboard.display');
Route::get('faq', [App\Http\Controllers\DashboardController::class, 'faq'])->name('dashboard.faq');

Route::get('profile', [App\Http\Controllers\EmployeeController::class, 'profile'])->name('employee.profile');
Route::post('check/in', [App\Http\Controllers\EmployeeController::class, 'on_duty'])->name('employee.on');
Route::post('check/out', [App\Http\Controllers\EmployeeController::class, 'off_duty'])->name('employee.off');
Route::get('attendance', [App\Http\Controllers\EmployeeController::class, 'attendance'])->name('employee.attendance');
Route::get('ring', [App\Http\Controllers\EmployeeController::class, 'ring'])->name('employee.ring');
Route::get('permit', [App\Http\Controllers\EmployeeController::class, 'permit'])->name('employee.permit');
Route::get('overtime', [App\Http\Controllers\EmployeeController::class, 'overtime'])->name('employee.overtime');
Route::get('patrol', [App\Http\Controllers\EmployeeController::class, 'patrol'])->name('employee.patrol');
Route::get('payslip', [App\Http\Controllers\EmployeeController::class, 'payslip'])->name('employee.payslip');

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

Route::get('applicants', [App\Http\Controllers\ApplicantController::class, 'index'])->name('applicant.index');
Route::get('applicants/test', [App\Http\Controllers\ApplicantController::class, 'testing'])->name('applicant.test');
Route::get('applicants/score', [App\Http\Controllers\ApplicantController::class, 'scoring'])->name('applicant.score');
Route::get('applicants/offering_letter', [App\Http\Controllers\ApplicantController::class, 'offering'])->name('applicant.approval');

Route::get('applicants/create', [App\Http\Controllers\ApplicantController::class, 'create'])->name('applicant.create');
Route::post('applicants/store', [App\Http\Controllers\ApplicantController::class, 'store'])->name('applicant.store');

Route::get('proposals', [App\Http\Controllers\ProposalController::class, 'index'])->name('proposal.index');

