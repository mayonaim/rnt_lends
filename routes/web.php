<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// login
Route::get('/', function () {
    return redirect('/peminjam/dashboard');
});
// Route::get('/login', [UserController::class, 'showLoginForm'])
    // ->name('login');
//
// Route::post('/login', [UserController::class, 'verifyLogin'])
    // ->name('login.verify');
//
// Route::get('/register', [UserController::class, 'showRegistrationForm'])
    // ->name('register');
//
// Route::post('/register', [UserController::class, 'store'])
    // ->name('register.store');
//
// pengusul
Route::get('/peminjam/daftarRuangan', function () {
    return view('peminjam.daftarRuangan');
})->name('peminjam.daftarRuangan');

Route::get('/peminjam/dashboard', function () {
    return view('peminjam.dashboard');
})->name('peminjam.dashboard');

Route::get('/peminjam/history', function () {
    return view('peminjam.riwayatPeminjaman');
})->name('peminjam.history');



// picLab
Route::get('/picLab/dashboard', function () {
    return view('picLab.dashboard');
})->name('picLab.dashboard');

Route::get('/picLab/kelolaRuangan', function () {
    return view('picLab.kelolaRuangan');
})->name('picLab.kelolaRuangan');

Route::get('/picLab/history', function () {
    return view('picLab.riwayatPeminjaman');
})->name('picLab.history');

//admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/history', function () {
    return view('admin.riwayatPeminjaman');
})->name('admin.history');

Route::get('/admin/kelolaRuangan', function () {
    return view('admin.kelolaRuangan');
})->name('admin.kelolaRuangan');

Route::get('/admin/kelolaUser', function () {
    return view('admin.kelolaUser');
})->name('admin.kelolaUser');

//penangungJawab
Route::get('/penanggung_jawab.pj_histori', function () {
    return view('penanggung_jawab.pj_histori');
})->name('penanggung_jawab.pj_histori');

Route::get('/penanggung_jawab.pj_home', function () {
    return view('penanggung_jawab.pj_home');
})->name('penanggung_jawab.pj_home');
