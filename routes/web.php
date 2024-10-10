<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RandevuController;
use App\Http\Controllers\ServiceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\UserController;
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
    return view('services');
});


Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard{id}', [DashboardController::class, 'show'])->name('dashboard');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/seviceapi',action: [ServiceController::class,'destroy1']);

/**Randevular*/

Route::get('dashboard/{id}/randevular', [RandevuController::class, 'getRandevu'])->name('randevu');
Route::get('randevu/create/{id}', [RandevuController::class, 'create'])->name('create');
Route::post('/randevu/store', [RandevuController::class, 'store'])->name('randevu.store');
