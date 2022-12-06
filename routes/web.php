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
    return view('dashboard', ['title' => 'Home']);
});

Route::get('dashboard', function () {
    return view('dashboard', ['title' => 'Home']);
});

Route::get('employee', function () {
    return view('dashboard', ['title' => 'Home']);
});
Route::get('applicant', function () {
    return view('dashboard', ['title' => 'Home']);
});

Route::get('vacancy', function () {
    return view('dashboard', ['title' => 'Home']);
});
Route::get('login', function () {
    return view('login', ['title' => 'Login']);
});

Route::get('register', function () {
    return view('register', ['title' => 'Register']);
});
Route::get('forgot', function () {
    return view('forgot', ['title' => 'Forgot']);
});

Route::get('fzo', function () {
    return view('401', ['title' => 'Unauthorized']);
});
Route::get('fzf', function () {
    return view('404', ['title' => 'Not Found']);
});
Route::get('fhd', function () {
    return view('500', ['title' => 'Invalid']);
});


