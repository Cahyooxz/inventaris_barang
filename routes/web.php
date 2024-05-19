<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PeminjamanController;
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
    return view('welcome');
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

Route::get('/data-barang',[BarangController::class,'index'])->middleware('auth')->name('barang.index');
Route::get('/data-barang/create',[BarangController::class,'create'])->middleware('auth')->name('barang.create');
Route::post('/data-barang/create/add',[BarangController::class,'store'])->middleware('auth')->name('barang.store');
Route::get('/data-barang/show/{id}',[BarangController::class,'show'])->middleware('auth')->name('barang.show');
Route::get('/barang/download',[BarangController::class, 'download'])->middleware(['auth', 'verified'])->name('download-barang');

Route::middleware(['auth','verified','role:admin'])->prefix('pembelian-barang')->group(function(){
    Route::get('/', [PembelianController::class,'index'])->name('pembelian.index');
    Route::get('/create', [PembelianController::class,'create'])->name('pembelian.create');
    Route::post('/create/add', [PembelianController::class,'store'])->name('pembelian.store');
    Route::get('/edit/{id}', [PembelianController::class,'edit'])->name('pembelian.edit');
    Route::put('/edit/{id}/update', [PembelianController::class,'update'])->name('pembelian.update');
});
Route::middleware(['auth','verified','role:admin'])->prefix('peminjaman-barang')->group(function(){
    Route::get('/', [PeminjamanController::class,'index'])->name('peminjaman.index');
    Route::get('/create', [PeminjamanController::class,'create'])->name('peminjaman.create');
    Route::post('/create/add', [PeminjamanController::class,'store'])->name('peminjaman.store');
    Route::get('/edit/{id}', [PeminjamanController::class,'edit'])->name('peminjaman.edit');
    Route::put('/edit/{id}/update', [PeminjamanController::class,'update'])->name('peminjaman.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
