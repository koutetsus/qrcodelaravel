<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
->middleware('guest')
->name('login');
Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke halaman login
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/admin/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
        Route::post('/admin/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
        Route::get('/absensi/scan/{id}', [AbsensiController::class, 'scan'])->name('absensi.scan');
        Route::post('/absensi/{id}/store', [AbsensiController::class, 'storeSiswa'])->name('absensi.storeSiswa');
        Route::get('/admin/dashboard', [AbsensiController::class, 'dashboard'])->name('dashboard');

        Route::post('/absensi/{id}/siswa/store', [AbsensiSiswaController::class, 'store'])->name('absensiSiswa.store');
        Route::post('/absensi/{id}/store', [AbsensiController::class, 'storeSiswa'])->name('absensi.storeSiswa');

        Route::get('/absensi/scan/{id}', [AbsensiController::class, 'scan'])->name('absensi.scan');
        Route::post('/absensi/submit', [AbsensiController::class, 'submit'])->name('absensi.submit');


        Route::post('/absensi/{id}/siswa', [AbsensiSiswaController::class, 'store'])->name('absensi.siswa.store');
        Route::get('/admin/absensi/dashboard', [AbsensiSiswaController::class, 'dashboard'])->name('admin.absensi.dashboard');
        Route::get('absensi/download/{id}', [AbsensiController::class, 'download'])->name('absensi.download');
        Route::get('/absensi/monitoring', [AbsensiSiswaController::class, 'index'])->name('absensi.monitoring');
        Route::prefix('absensi')->group(function () {
            Route::get('/absensisiswa', [AbsensiSiswaController::class, 'index'])->name('absensi.absensisiswa');
            Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
        });


        Route::get('/admin/absensi/download/{id}', function ($id) {
            $absensi = \App\Models\Absensi::findOrFail($id);

            // Dapatkan path relatif dari database
            $filePath = 'qrcodes/' . $absensi->photo;

            // Pastikan file ada di folder public
            if (Storage::disk('public')->exists($filePath)) {
                return Storage::disk('public')->download($filePath);
            } else {
                return response()->json(['error' => 'File QR Code tidak ditemukan.'], 404);
            }
        })->name('absensi.download');
        });

require __DIR__.'/auth.php';
