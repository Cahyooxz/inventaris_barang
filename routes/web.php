<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/users',[UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users.index');
Route::get('/users/create',[UserController::class, 'create'])->middleware(['auth', 'verified'])->name('users.create');
Route::post('/users/create/user',[UserController::class, 'store'])->middleware(['auth', 'verified'])->name('users.store');
Route::get('/users/edit/user/{id}',[UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('users.edit');
Route::put('/users/edit/user/{id}/update',[UserController::class, 'update'])->middleware(['auth', 'verified'])->name('users.update');
Route::delete('/users/detroy/{id}',[UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('users.destroy');

Route::get('/dashboard/download',[DashboardController::class, 'download'])->middleware(['auth', 'verified'])->name('download');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
