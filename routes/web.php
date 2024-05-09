<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KlantController;
use Illuminate\Support\Facades\Route;

// De route's voor het werknemersdashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/berichten', [EmployeeController::class, 'berichten'])->name('employee.berichten');
    Route::get('/klanten/{id}', [KlantController::class, 'show'])->name('klanten.show');
    Route::get('/klanten', [KlantController::class, 'index'])->name('klanten.index');
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
