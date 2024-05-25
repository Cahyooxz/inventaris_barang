<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
    return view('auth.login');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/create/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/edit/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/download',[UserController::class, 'download'])->middleware(['auth', 'verified'])->name('download');
});
Route::middleware(['auth','verified'])->prefix('data-barang')->group(function(){
    Route::get('/',[BarangController::class,'index'])->middleware('auth')->name('barang.index');
    Route::get('/create',[BarangController::class,'create'])->middleware('auth')->name('barang.create');
    Route::post('/create/add',[BarangController::class,'store'])->middleware('auth')->name('barang.store');
    Route::get('/show/{id}',[BarangController::class,'show'])->middleware('auth')->name('barang.show');
    Route::get('/edit/{id}',[BarangController::class,'edit'])->middleware('auth')->name('barang.edit');
    Route::put('/edit/{id}/update',[BarangController::class,'update'])->middleware('auth')->name('barang.update');
    Route::delete('/delete/{id}',[BarangController::class,'destroy'])->middleware('auth')->name('barang.destroy');
    Route::get('/download',[BarangController::class, 'download'])->middleware(['auth', 'verified'])->name('download-barang');
});

Route::middleware(['auth','verified','role:admin|operator|petugas'])->prefix('pembelian-barang')->group(function(){
    Route::get('/', [PembelianController::class,'index'])->name('pembelian.index');
    Route::get('/create', [PembelianController::class,'create'])->name('pembelian.create');
    Route::post('/create/add', [PembelianController::class,'store'])->name('pembelian.store');
    Route::get('/edit/{id}', [PembelianController::class,'edit'])->name('pembelian.edit');
    Route::put('/edit/{id}/update', [PembelianController::class,'update'])->name('pembelian.update');
    Route::delete('/delete/{id}', [PembelianController::class,'destroy'])->name('pembelian.destroy');
    Route::get('/download', [PembelianController::class,'download'])->name('pembelian.download');
});
Route::middleware(['auth','verified','role:admin|operator'])->prefix('pemakaian-barang')->group(function(){
    Route::get('/', [PemakaianController::class,'index'])->name('pemakaian.index');
    Route::get('/create', [PemakaianController::class,'create'])->name('pemakaian.create');
    Route::post('/create/add', [PemakaianController::class,'store'])->name('pemakaian.store');
    Route::get('/edit/{id}', [PemakaianController::class,'edit'])->name('pemakaian.edit');
    Route::put('/edit/{id}/update', [PemakaianController::class,'update'])->name('pemakaian.update');
    Route::delete('/delete/{id}/', [PemakaianController::class,'destroy'])->name('pemakaian.destroy');
    Route::get('/download', [PemakaianController::class,'download'])->name('pemakaian.download');
});

Route::middleware(['auth','verified','role:admin'])->prefix('ruangan')->group(function(){
    Route::get('/', [RuanganController::class,'index'])->name('ruangan.index');
    Route::get('/create', [RuanganController::class,'create'])->name('ruangan.create');
    Route::post('/create/add', [RuanganController::class,'store'])->name('ruangan.store');
    Route::get('/edit/{id}', [RuanganController::class,'edit'])->name('ruangan.edit');
    Route::put('/edit/{id}/update', [RuanganController::class,'update'])->name('ruangan.update');
    Route::delete('/delete/{id}/', [RuanganController::class,'destroy'])->name('ruangan.destroy');
});

Route::middleware(['auth','verified','role:admin'])->prefix('inventaris')->group(function(){
    Route::get('/', [InventarisController::class,'index'])->name('inventaris.index');
    Route::get('/download', [InventarisController::class,'download'])->name('inventaris.download');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
