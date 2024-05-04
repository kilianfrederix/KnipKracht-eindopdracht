<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\UserRoleCheck;
use Illuminate\Support\Facades\Route;

// Auth routes voor zowel klanten als werknemers
Route::group(['middleware' => 'guest'], function () {
    // Inlogpagina
    Route::get('/', [AuthController::class, 'login'])->name('login.get');
    Route::get('/login', [AuthController::class, 'login'])->name('login.get'); // Optioneel, voor het geval dat de hoofdroute wordt ingevoerd in de adresbalk
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

    // Registratiepagina
    Route::get('/register', [AuthController::class, 'register'])->name('register.get');
    Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');
});

// In routes/web.php


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Uitloggenroute
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->Middleware('auth');

// Klant routes
Route::middleware(['auth', UserRoleCheck::class . ':customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
});

// Werknemer routes
Route::middleware(['auth', UserRoleCheck::class . ':employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
});
