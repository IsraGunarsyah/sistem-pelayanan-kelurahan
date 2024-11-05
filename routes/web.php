<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SuratKeteranganTidakMampuController;
use App\Http\Controllers\SuratKeteranganUsahaController;
use App\Http\Controllers\SuratKeteranganKematianController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DataRtController;


// Route untuk halaman login
Route::get('/', function () {
    return view('login');
})->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grouping routes for Admin with prefix and middleware
Route::prefix('staff')->name('Staff.')->middleware('auth')->group(function () {
   Route::get('/dashboard', [StaffController::class,'index'])->name('index');
   Route::get('/pelayanan', [StaffController::class,'pelayanan'])->name('pelayanan');
   Route::get('/surat-keterangan-tidak-mampu/create', [SuratKeteranganTidakMampuController::class, 'create'])->name('surat_keterangan_tidak_mampu.index');
   Route::post('/surat-keterangan-tidak-mampu/store', [SuratKeteranganTidakMampuController::class, 'store'])->name('surat_keterangan_tidak_mampu.store');
    Route::get('/surat-keterangan-usaha/create', [SuratKeteranganUsahaController::class, 'create'])->name('surat_keterangan_usaha.index');
    Route::post('/surat-keterangan-usaha/store', [SuratKeteranganUsahaController::class, 'store'])->name('surat_keterangan_usaha.store');
    Route::get('/surat-keterangan-kematian/create', [SuratKeteranganKematianController::class, 'create']) -> name('surat_keterangan_kematian.index');
    Route::post('/surat-keterangan-kematian/store', [SuratKeteranganKematianController::class, 'store'])->name('surat_keterangan_kematian.store');
    
    // riwayat pembuatan surat
    Route::get('/Riwayat Pembuatan Surat', [RiwayatController::class, 'index'])->name('riwayat.index');
    // riwayat pembuatan surat tidak mampu    
    Route::get('/Riwayat Pembuatan Surat/Surat Keterangan Tidak Mampu', [RiwayatController::class, 'tidakmampu'])->name('riwayat.tidak_mampu');
    Route::get('/surat/tidak-mampu/{id}/cetak', [RiwayatController::class, 'cetakPdf'])->name('riwayat.pdf.surat_tidak_mampu');
    Route::put('/riwayat-surat-tidak-mampu/{id}', [RiwayatController::class, 'update'])->name('surat_keterangan_tidak_mampu.update');
    Route::delete('/riwayat-surat-tidak-mampu/{id}', [RiwayatController::class, 'destroy'])->name('surat_keterangan_tidak_mampu.delete');

    // riwayat pembuatan surat usaha   
    Route::get('/Riwayat Pembuatan Surat/Surat Keterangan Usaha', [RiwayatController::class, 'usaha'])->name('riwayat.usaha');
    Route::get('/surat/Usaha/{id}/cetak', [RiwayatController::class, 'cetakPdfUsaha'])->name('riwayat.pdf.surat_usaha');
    Route::put('/riwayat-surat-keterangan-usaha/{id}', [RiwayatController::class, 'updateUsaha'])->name('surat_keterangan_usaha.update');
    Route::delete('/riwayat-surat-usaha/{id}', [RiwayatController::class, 'destroyUsaha'])->name('surat_keterangan_usaha.delete');

    // riwayat pembuatan surat kematian  
    Route::get('/Riwayat Pembuatan Surat/Surat Keterangan Kematian', [RiwayatController::class, 'kematian'])->name('riwayat.kematian');
    Route::get('/surat/kematian/{id}/cetak', [RiwayatController::class, 'cetakPdfKematian'])->name('riwayat.pdf.surat_kematian');
    Route::put('/riwayat-surat-keterangan-kematian/{id}', [RiwayatController::class, 'updateKematian'])->name('surat_keterangan_kematian.update');
    Route::delete('/riwayat-surat-kematian/{id}', [RiwayatController::class, 'destroyKematian'])->name('surat_keterangan_kematian.delete');
  
    Route::get('/generate-no-sk-rt/{rt}/{type}', [SuratController::class, 'generateNoSkRt']);

    // Data RT
    Route::get('/Data RT', [StaffController::class, 'dataRT'])->name('datart');
    Route::post('/Data RT/Input Data RT', [DataRtController::class, 'store'])->name('datart.store');          // Store new RT
    Route::put('/Data RT/update/{id}', [DataRtController::class, 'update'])->name('datart.update');
    Route::delete('/Data RT/{id}', [DataRtController::class, 'destroy'])->name('datart.destroy');
});

// Grouping routes for SuperAdmin with prefix and middleware
Route::prefix('Admin')->name('Admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index'); // Dashboard  Admin
    Route::get('/staff', [AdminController::class, 'daftarStaff'])->name('staff.daftarstaff'); // Daftar Staff
    Route::get('/staff/create', [AdminController::class, 'create'])->name('staff.create'); // Registrasi Staff
    Route::post('/staff/store', [AdminController::class, 'store'])->name('staff.create.store');
    Route::get('/staff/{id}/edit', [AdminController::class, 'edit'])->name('staff.daftarstaff.edit');
    Route::delete('/staff/{id}', [AdminController::class, 'destroy'])->name('staff.daftarstaff.destroy');
    

});
