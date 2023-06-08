<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\PICController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BorrowRequestController;

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
    return redirect()->route('login');
});

// auth

Route::get('/login', [UserController::class, 'index'])->name('login');

Route::get('/register', [UserController::class, 'create'])->name('register');

Route::post('/register', [UserController::class, 'store'])->name('user.store');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::middleware('role:borrower')->group(function () {
    Route::get('/peminjam/home', [BorrowerController::class, 'home'])->name('borrower.index');

    Route::get('/peminjam/view/assets', [BorrowerController::class, 'assets'])->name('borrower.view_assets');

    Route::get('/peminjam/view/borrowing-requests', [BorrowerController::class, 'borrowing_requests'])->name('borrower.view_borrowing_requests');

    Route::post('/peminjam/manage/borrowing-requests/create', [BorrowRequestController::class, 'store'])->name('borrow_request.store');

    Route::post('/peminjam/manage/borrowing-requests/{id}/edit', [BorrowRequestController::class, 'update'])->name('borrow_request.update');

    Route::patch('/peminjam/manage/borrowing-requests/{id}/finish', [BorrowRequestController::class, 'update'])->name('borrow_request.update_status_finished');

    Route::delete('/peminjam/manage/borrowing-requests/{id}/delete', [BorrowRequestController::class, 'destroy'])->name('borrow_request.destroy');
});
Route::middleware('role:supervisor')->group(function () {
    Route::get('/supervisor/home', [SupervisorController::class, 'index'])->name('supervisor.index');

    Route::get('/penanggung-jawab/view/borrowing-requests', [SupervisorController::class, 'borrowing_requests'])->name('borrower.view_borrowing_requests');

    Route::patch('/penanggung-jawab/manage/borrowing-requests/{id}/validate', [BorrowRequestController::class, 'update'])->name('borrow_request.update_status_validated');

    Route::patch('/penanggung-jawab/manage/borrowing-requests/{id}/reject', [BorrowRequestController::class, 'update'])->name('borrow_request.update_status_rejected');
});
Route::middleware('role:pic')->group(function () {
    Route::get('/pic/home', [PICController::class, 'index'])->name('pic.index');

    Route::get('/pic/view/borrowing-requests', [PICController::class, 'borrowing_requests'])->name('borrower.view_borrowing_requests');

    Route::patch('/pic/manage/borrowing-requests/{id}/validate', [BorrowRequestController::class, 'update'])->name('borrow_request.update_status_validated');

    Route::patch('/pic/manage/borrowing-requests/{id}/reject', [BorrowRequestController::class, 'update'])->name('borrow_request.update_status_rejected');
});
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/view/assets', [AdminController::class, 'assets'])->name('admin.view_assets');

    Route::get('/admin/view/assets', [AdminController::class, 'assets'])->name('admin.view_assets');

    Route::post('/admin/manage/assets/create', [AssetController::class, 'store'])->name('asset.store');

    Route::put('/admin/manage/assets/edit', [AssetController::class, 'update'])->name('asset.edit');

    Route::delete('/admin/manage/assets/delete', [AssetController::class, 'destroy'])->name('asset.destroy');
});
