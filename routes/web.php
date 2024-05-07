<?php

use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\AuthController;
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


// Afspraak route
Route::get('/afspraak', [AfspraakController::class, 'afspraak'])->name('afspraak.get');
Route::post('/afspraak/opslaan', [AfspraakController::class, 'opslaan'])->name('afspraak.opslaan');
Route::post('/save-customer-data', [KlantController::class, 'save'])->name('save_customer_data');
Route::get('/afspraak/bedankt', function () {
    return view('afspraak.bedankt');
})->name('afspraak.bedankt');


Route::get('/afspraak/afsprakenShow/{id}', [KlantController::class, 'show']);




// Inlogpagina
Route::get('/login', [AuthController::class, 'login'])->name('login.get');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

// Registratiepagina
Route::get('/register', [AuthController::class, 'register'])->name('register.get');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');

// Uitloggenroute
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
