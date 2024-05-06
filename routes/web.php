<?php

use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// De route's voor het werknemersdashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/klanten', [EmployeeController::class, 'klanten'])->name('employee.klanten');
    Route::get('/employee/berichten', [EmployeeController::class, 'berichten'])->name('employee.berichten');
});

// De standaard homepagina
Route::get('/', [HomeController::class, 'index'])->name('home');

// Afspraak route
Route::get('/afspraak', [AfspraakController::class, 'afspraak'])->name('afspraak.get');

// Inlogpagina
Route::get('/login', [AuthController::class, 'login'])->name('login.get');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

// Registratiepagina
Route::get('/register', [AuthController::class, 'register'])->name('register.get');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');

// Uitloggenroute
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
