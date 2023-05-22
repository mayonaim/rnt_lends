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

//login
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [UserController::class, 'loginPage'])
    ->name('login');

Route::post('/login', [UserController::class, 'validateUser'])
    ->name('login.check');

Route::get('/signUp', [UserController::class, 'registerPage'])
    ->name('signUp');

Route::post('/signUp', [UserController::class, 'createNewUser'])
    ->name('register.new');

//peminjam
Route::get('/testLayout', function(){
    return view('layouts.layoutUmum');
});


//pendamping


//picLab


//admin
