<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SiswaController;
use App\Http\Controllers\Auth\AuthController;

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

Route::redirect('/', '/login');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/dashboard/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/dashboard/siswa/tambah', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/dashboard/siswa{id}/show', [SiswaController::class, 'show'])->name('siswa.show');
    Route::post('/dashboard/siswa{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
});

// Route::get('/', function () {
//     return view('welcome');
// });
