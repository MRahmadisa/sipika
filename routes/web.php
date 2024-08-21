<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataJabatanController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(['guest'])->group(function () {
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginProcess');
Route::post('/logout', [LoginController::class, 'logout'])->name('logoutProcess');

// Group untuk semua pengguna yang telah login
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/kehadiran-per-bulan', [DashboardController::class, 'getKehadiranPerBulan'])->name('dashboard.kehadiranPerBulan');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/tampilkan-pdf', [LaporanController::class, 'generatePdf'])->name('tampilkan-pdf');

    // Routes untuk Admin
    Route::middleware(['checkrole:Admin'])->group(function () {
        Route::get('/datajabatan', [DataJabatanController::class, 'index'])->name('datajabatan');
        Route::get('/datajabatan/create', [DataJabatanController::class, 'inputdatajabatan'])->name('inputdatajabatan');
        Route::post('/datajabatan', [DataJabatanController::class, 'store'])->name('storedatajabatan');
        Route::get('/editjabatan/{id}', [DataJabatanController::class, 'editjabatan'])->name('editjabatan');
        Route::put('/datajabatan/{id}/update', [DataJabatanController::class, 'update'])->name('updatejabatan');
        Route::delete('/datajabatan/{id}', [DataJabatanController::class, 'destroy'])->name('hapusjabatan');

        Route::get('/datapegawai', [DataPegawaiController::class, 'index'])->name('datapegawai');
        Route::get('/datapegawai/create', [DataPegawaiController::class, 'inputdatapegawai'])->name('inputdatapegawai');
        Route::post('/datapegawai', [DataPegawaiController::class, 'store'])->name('storedatapegawai');
        Route::get('/editpegawai/{id}', [DataPegawaiController::class, 'editpegawai'])->name('editpegawai');
        Route::put('/datapegawai/{id}/update', [DataPegawaiController::class, 'update'])->name('updatepegawai');
        Route::delete('/datapegawai/{id}', [DataPegawaiController::class, 'destroy'])->name('hapuspegawai');

        Route::get('/datapenggunaadmin', [DataPenggunaController::class, 'indexadmin'])->name('datapenggunaadmin');
        Route::get('/inputdatapenggunaadmin', [DataPenggunaController::class, 'inputdatapenggunaadmin'])->name('inputdatapenggunaadmin');
        Route::post('/datapenggunaadmin', [DataPenggunaController::class, 'store'])->name('storedatapenggunaadmin');
        Route::get('/datapenggunaadmin/{id}', [DataPenggunaController::class, 'editpenggunaadmin'])->name('editpenggunaadmin');
        Route::put('/datapenggunaadmin/{id}/update', [DataPenggunaController::class, 'update'])->name('updatepenggunaadmin');
        Route::delete('/datapenggunaadmin/{id}', [DataPenggunaController::class, 'destroy'])->name('hapuspenggunaadmin');

        Route::get('/datapenggunapimpinan', [DataPenggunaController::class, 'indexpimpinan'])->name('datapenggunapimpinan');
        Route::get('/inputdatapenggunapimpinan', [DataPenggunaController::class, 'inputdatapenggunapimpinan'])->name('inputdatapenggunapimpinan');
        Route::post('/datapenggunapimpinan', [DataPenggunaController::class, 'storeppm'])->name('storedatapenggunapimpinan');
        Route::get('/datapenggunapimpinan/{id}', [DataPenggunaController::class, 'editpenggunapimpinan'])->name('editpenggunapimpinan');
        Route::get('/datapenggunapimpinans/{id}', [DataPenggunaController::class, 'editpenggunapimpinans'])->name('showEditpenggunapimpinans');
        Route::put('/datapenggunapimpinan/{id}/update', [DataPenggunaController::class, 'updateppm'])->name('updatepenggunapimpinan');
        Route::delete('/datapenggunapimpinan/{id}', [DataPenggunaController::class, 'destroyppm'])->name('hapuspenggunapimpinan');


        Route::get('/datapenggunapegawai', [DataPenggunaController::class, 'indexpegawai'])->name('datapenggunapegawai');
        Route::get('/inputdatapenggunapegawai', [DataPenggunaController::class, 'inputdatapenggunapegawai'])->name('inputdatapenggunapegawai');
        Route::post('/datapenggunapegawai', [DataPenggunaController::class, 'storepgw'])->name('storedatapenggunapegawai');
        Route::get('/datapenggunapegawai/{id}', [DataPenggunaController::class, 'editpenggunapegawai'])->name('editpenggunapegawai');
        Route::get('/datapenggunapegawais/{id}', [DataPenggunaController::class, 'editpenggunapegawais'])->name('showEditpenggunapegawais');
        Route::put('/datapenggunapegawai{id}/update', [DataPenggunaController::class, 'updatepgw'])->name('updatepenggunapegawai');
        Route::delete('/datapenggunapegawai/{id}', [DataPenggunaController::class, 'destroypgw'])->name('hapuspenggunapegawai');

    });

    // Routes untuk Pimpinan
    Route::middleware(['checkrole:Pimpinan, Pegawai'])->group(function () {
        Route::get('/generatepdf', [LaporanController::class, 'generatePdf'])->name('generatePdf');
    });

    // Routes untuk Pegawai
    Route::middleware(['checkrole:Pegawai'])->group(function () {
        Route::post('/presensimasuk', [PresensiController::class, 'presensiMasuk'])->name('presensiMasuk');
        Route::post('/presensipulang', [PresensiController::class, 'presensiPulang'])->name('presensiPulang');
    });
});
