<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;

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
// root

Route::get('/', function () {
    return redirect('login');
});

// auth

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('login', [UserController::class, 'login'])->name('login.post');

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');

Route::post('register', [UserController::class, 'store'])->name('register.post');

Route::post('logout', [UsertController::class, 'logout'])->name('logout');

// peminjam
Route::get('/peminjam/daftarRuangan', function () {
    return view('peminjam.daftarAsset');
})->name('borrower.daftarAsset');

Route::get('/peminjam/dashboard', function () {
    return view('peminjam.dashboard');
})->name('borrower.dashboard');

Route::get('/peminjam/history', function () {
    return view('peminjam.riwayatPeminjaman');
})->name('borrower.history');



//admin
Route::get('/admin/dashboard',[AdminController::class, 'home'])->name('admin.dashboard');

Route::get('/admin/kelolaAsset',[AdminController::class, 'assets'])->name('admin.kelolaAsset');

Route::post('/admin/kelolaAsset',[AssetController::class, 'store'])->name('admin.tambahAsset');

Route::get('/admin/history', function () {
    return view('admin.riwayatPeminjaman');
})->name('admin.history');

Route::get('/admin/kelolaUser', function () {
    return view('admin.kelolaUser');
})->name('admin.kelolaUser');

// PIC Lab
Route::get('/pic/dashboard', function () {
    return view('picLab.dashboard');
})->name('pic.dashboard');

Route::get('/pic/kelolaRuangan', function () {
    return view('picLab.kelolaRuangan');
})->name('pic.kelolaRuangan');

Route::get('/pic/history', function () {
    return view('picLab.riwayatPeminjaman');
})->name('pic.history');

//Penangung Jawab
Route::get('/penanggung-jawab/dashboard', function () {
    return view('penanggungJawab.dashboard'); })->name('supervisor.dashboard');

Route::get('/penanggung-jawab/history', function () {
    return view('penanggungJawab.riwayatPeminjaman');
})->name('supervisor.riwayatPeminjaman');
