<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login.get')->middleware('guest');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register.get')->middleware('guest');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
