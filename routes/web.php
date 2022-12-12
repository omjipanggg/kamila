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

Route::resource('applicant', App\Http\Controllers\ApplicantController::class);

Route::get('employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('employee/{employee}/on', [App\Http\Controllers\EmployeeController::class, 'on_duty'])->name('employee.on');
Route::post('employee/{employee}/off', [App\Http\Controllers\EmployeeController::class, 'off_duty'])->name('employee.off');

Route::resource('vacancy', App\Http\Controllers\ProposalController::class);

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('check');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');