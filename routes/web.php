<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KehadiranController;
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
    //return view('welcome');
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // List kegiatan
    Route::get('/kegiatan', [KegiatanController::class, 'index'])
        ->name('kegiatan.index');

    // Form tambah
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])
        ->name('kegiatan.create');

    // Simpan
    Route::post('/kegiatan', [KegiatanController::class, 'store'])
        ->name('kegiatan.store');

    // Detail + link absensi
    Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])
        ->name('kegiatan.show');

    // Form edit
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])
        ->name('kegiatan.edit');

    // Update
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])
        ->name('kegiatan.update');

    // Delete
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])
        ->name('kegiatan.destroy');
        
});

//publik link absensi
Route::get('/absen/{token}', [KehadiranController::class, 'show'])
    ->name('absen.form');

Route::post('/absen', [KehadiranController::class, 'store'])
    ->name('absen.store');

require __DIR__.'/auth.php';
