<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;

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
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/daftar-guru', [LayananController::class, 'daftarGuru'])->name('daftar-guru');
    Route::get('/guru/create', [LayananController::class, 'create'])->name('guru.create');
    Route::post('/guru', [LayananController::class, 'store'])->name('guru.store');
    Route::get('/guru/{guru}/edit', [LayananController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{guru}', [LayananController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{guru}', [LayananController::class, 'destroy'])->name('guru.destroy');
});
