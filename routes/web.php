<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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
    return redirect('/login');
});
Route::get('/login', [AccountController::class, 'main'])
    ->name('login');

Route::post('/login', [AccountController::class, 'check'])
    ->name('login.check');

Route::get('/signUp', [AccountController::class, 'signUp'])
    ->name('signUp');

Route::post('/signUp', [AccountController::class, 'store'])
    ->name('signUp.store');

// pengusul
Route::get('/pengusul.pengusul_alat', function () {
    return view('pengusul.pengusul_alat');
})->name('pengusul.pengusul_alat');

Route::get('/pengusul.pengusul_ruang', function () {
    return view('pengusul.pengusul_ruang');
})->name('pengusul.pengusul_ruang');

Route::get('/pengusul.pengusul_home', function () {
    return view('pengusul.pengusul_home');
})->name('pengusul.pengusul_home');

Route::get('/pengusul.pengusul_histori', function () {
    return view('pengusul.pengusul_histori');
})->name('pengusul.pengusul_histori');

//penangungJawab
Route::get('/penanggung_jawab.pj_histori', function () {
    return view('penanggung_jawab.pj_histori');
})->name('penanggung_jawab.pj_histori');

Route::get('/penanggung_jawab.pj_home', function () {
    return view('penanggung_jawab.pj_home');
})->name('penanggung_jawab.pj_home');


// picLab
Route::get('/pic_lab.pic_home', function () {
    return view('pic_lab.pic_home');
})->name('pic_lab.pic_home');

Route::get('/pic_lab.pic_kelolaalat', function () {
    return view('pic_lab.pic_kelolaalat');
})->name('pic_lab.pic_kelolaalat');

Route::get('/pic_lab.pic_kelolaruang', function () {
    return view('pic_lab.pic_kelolaruang');
})->name('pic_lab.pic_kelolaruang');

Route::get('/pic_lab.pic_histori', function () {
    return view('pic_lab.pic_histori');
})->name('pic_lab.pic_histori');

//administrator
Route::get('/administrator.admin_home', function () {
    return view('administrator.admin_home');
})->name('administrator.admin_home');

Route::get('/administrator.admin_histori', function () {
    return view('administrator.admin_histori');
})->name('administrator.admin_histori');

Route::get('/administrator.admin_kelolaalat', function () {
    return view('administrator.admin_kelolaalat');
})->name('administrator.admin_kelolaalat');

Route::get('/administrator.admin_kelolaruang', function () {
    return view('administrator.admin_kelolaruang');
})->name('administrator.admin_kelolaruang');

Route::get('/administrator.admin_manajemen_user', function () {
    return view('administrator.admin_manajemen_user');
})->name('administrator.admin_manajemen_user');
