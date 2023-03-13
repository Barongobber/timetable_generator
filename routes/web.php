<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\importController;
use App\Http\Controllers\pdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use PDF;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/check_user', [LoginController::class, 'check_user'])->name('check-user');
Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    // route for the website view
    Route::view('/home', 'dashboard')->name('dashboard');
    Route::view('/table/create', 'generator');
    Route::view('/table/info', 'info');
    Route::view('/profile', 'profile')->name('profile');
    Route::get('/excel/{id}', [pdfController::class, 'excel']);
    Route::get('/generate/{id}', [pdfController::class, 'pdf']);
    Route::post('/import', [importController::class, 'import']);
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});