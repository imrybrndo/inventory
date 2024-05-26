<?php

use App\Http\Controllers\Admin\CetakLaporanObatKeluarController;
use App\Http\Controllers\Admin\CetakLaporanStokObat;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Pengguna\BerandaController;
use App\Http\Controllers\Pengguna\ObatKeluarController;
use App\Http\Controllers\Pengguna\ObatMasukController;
use App\Http\Controllers\Pengguna\StokObatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cetak_obatkeluar', [CetakLaporanObatKeluarController::class, 'index'])->name('cetakobatkeluar');
    Route::get('/cetak_stok', [CetakLaporanStokObat::class, 'index'])->name('cetakstokobat');
    Route::resource('/obat', \App\Http\Controllers\Admin\DaftarObatController::class);
    Route::resource('/obatkeluar', \App\Http\Controllers\Admin\ObatKeluarController::class);
    Route::resource('/listobat', \App\Http\Controllers\Admin\ObatController::class);
    Route::resource('/cetak', \App\Http\Controllers\Admin\CetakLaporanController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified', 'role:pengguna')->group(function(){
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/listobatkeluar', [ObatKeluarController::class, 'index'])->name('obatkeluar');
    Route::get('/listobatmasuk', [ObatMasukController::class, 'index'])->name('obatmasuk');
    Route::get('/stokobat', [StokObatController::class, 'index'])->name('stokobat');
});
// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
