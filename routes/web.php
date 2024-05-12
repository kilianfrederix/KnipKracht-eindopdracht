<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DienstController;
use App\Http\Controllers\KapperController;
use Illuminate\Support\Facades\Route;

// De route's voor het werknemersdashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

    // CRUD routes voor diensten
    Route::get('/diensten', [DienstController::class, 'index'])->name('diensten.index');
    Route::get('/diensten/create', [DienstController::class, 'create'])->name('diensten.create');
    Route::post('/diensten', [DienstController::class, 'store'])->name('diensten.store');
    Route::get('/diensten/{dienst}/edit', [DienstController::class, 'edit'])->name('diensten.edit');
    Route::put('/diensten/{dienst}', [DienstController::class, 'update'])->name('diensten.update');
    Route::delete('/diensten/{dienst}', [DienstController::class, 'destroy'])->name('diensten.destroy');

    // CRUD routes voor klanten
    Route::get('/klanten', [KlantController::class, 'index'])->name('klanten.index');
    Route::get('/klanten/create', [KlantController::class, 'create'])->name('klanten.create');
    Route::post('/klanten', [KlantController::class, 'store'])->name('klanten.store');
    Route::get('/klanten/{klant}/edit', [KlantController::class, 'edit'])->name('klanten.edit');
    Route::put('/klanten/{klant}', [KlantController::class, 'update'])->name('klanten.update');
    Route::delete('/klanten/{klant}', [KlantController::class, 'destroy'])->name('klanten.destroy');

    // CRUD routes voor kappers
    Route::get('/kappers', [KapperController::class, 'index'])->name('kappers.index');
    Route::get('/kappers/create', [KapperController::class, 'create'])->name('kappers.create');
    Route::post('/kappers', [KapperController::class, 'store'])->name('kappers.store');
    Route::get('/kappers/{kapper}/edit', [KapperController::class, 'edit'])->name('kappers.edit');
    Route::put('/kappers/{kapper}', [KapperController::class, 'update'])->name('kappers.update');
    Route::delete('/kappers/{kapper}', [KapperController::class, 'destroy'])->name('kappers.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');
});


// De standaard pagina's
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

// calendar routes
Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

// Inlogpagina
Route::get('/login', [AuthController::class, 'login'])->name('login.get');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

// Registratiepagina
Route::get('/register', [AuthController::class, 'register'])->name('register.get');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');

// Uitloggenroute
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
