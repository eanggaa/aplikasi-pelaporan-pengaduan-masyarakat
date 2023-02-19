<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/postregister', [LoginController::class, 'postregister'])->name('postregister');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
});

Route::prefix('petugas')->name('petugas.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('dashboard');
    });
});

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    });
});