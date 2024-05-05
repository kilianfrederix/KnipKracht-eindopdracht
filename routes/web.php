<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // De route voor het klantendashboard verwijderen
    // Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');

    // De route voor het werknemersdashboard behouden
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/klanten', [EmployeeController::class, 'klanten'])->name('employee.klanten');
    Route::get('/employee/berichten', [EmployeeController::class, 'berichten'])->name('employee.berichten');

    // De standaard homepagina
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Auth routes voor zowel klanten als werknemers
Route::group(['middleware' => 'guest'], function () {
    // Inlogpagina
    Route::get('/', [AuthController::class, 'login'])->name('login.get');
    Route::get('/login', [AuthController::class, 'login'])->name('login.get');
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

    // Registratiepagina
    Route::get('/register', [AuthController::class, 'register'])->name('register.get');
    Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');
});

// Uitloggenroute
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
