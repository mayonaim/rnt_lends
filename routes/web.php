<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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
    return redirect()->route('home');
});

// auth

Route::get('/login', [LoginController::class, 'home'])->name('home');

Route::post('/login/auth', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'create'])->name('register');

Route::post('/register/create', [UserController::class, 'store'])->name('user.store');


Route::middleware('role:borrower')->group(function () {
    Route::get('/borrower/home', [BorrowerController::class, 'home'])->name('borrower.home');

    Route::get('/borrower/view/assets', [BorrowerController::class, 'assets'])->name('borrower.view_assets');

    Route::get('borrower/data/assets', [AssetController::class, 'index'])->name('borrower.data_assets');

    Route::get('/borrower/view/borrowing-requests', [BorrowerController::class, 'borrowRequests'])->name('borrower.view_borrowing_requests');

    Route::get('/borrower/data/borrowing-request/', [BorrowerController::class, 'user_borrowRequests'])->name('borrower.borrow_requests');

    Route::post('/borrower/manage/borrowing-requests/create', [BorrowRequestController::class, 'store'])->name('borrow_request.store');

    Route::post('/borrower/manage/borrowing-requests/{id}/edit', [BorrowRequestController::class, 'update'])->name('borrow_request.update');

    Route::patch('/borrower/manage/borrowing-requests/{id}/finish', [BorrowRequestController::class, 'update'])->name('borrow_request.update_status_finished');

    Route::delete('/borrower/manage/borrowing-requests/{id}/delete', [BorrowRequestController::class, 'destroy'])->name('borrow_request.destroy');
});
Route::middleware('role:supervisor')->group(function () {
    Route::get('/supervisor/home', [SupervisorController::class, 'home'])->name('supervisor.home');

    Route::get('/supervisor/view/borrowing-requests', [SupervisorController::class, 'borrowRequests'])->name('supervisor.view_borrowing_requests');

    Route::get('/supervisor/data/borrowing-requests', [SupervisorController::class, 'user_borroRequests'])->name('supervisor.borrow_requests');

    Route::patch('/supervisor/manage/borrowing-requests/{id}/validate', [BorrowRequestController::class, 'update'])->name('supervisor.validate_borrow_request');

    Route::patch('/supervisor/manage/borrowing-requests/{id}/reject', [BorrowRequestController::class, 'update'])->name('supervisor.reject_borrow_request');
});
Route::middleware('role:pic')->group(function () {
    Route::get('/pic/home', [PICController::class, 'home'])->name('pic.home');

    Route::get('/pic/view/assets', [PICController::class, 'assets'])->name('pic.view_assets');

    Route::get('pic/data/assets', [PICController::class, 'user_assets'])->name('pic.data_assets');

    Route::put('/pic/manage/assets/{id}/edit', [AssetController::class, 'update'])->name('pic.edit_asset');

    Route::get('/pic/view/borrowing-requests', [PICController::class, 'borrowRequests'])->name('pic.view_borrowing_requests');

    Route::get('/pic/data/borrowing-requests', [PICController::class, 'user_borroRequests'])->name('pic.borrow_requests');

    Route::patch('/pic/manage/borrowing-requests/{id}/approve', [BorrowRequestController::class, 'update'])->name('pic.approve_borrow_request');

    Route::patch('/pic/manage/borrowing-requests/{id}/reject', [BorrowRequestController::class, 'update'])->name('pic.reject_borrow_request');
});
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');

    Route::get('/admin/view/assets', [AdminController::class, 'assets'])->name('admin.view_assets');

    Route::get('/admin/data/assets', [AssetController::class, 'index'])->name('admin.data_assets');

    Route::post('/admin/manage/assets/create', [AssetController::class, 'store'])->name('asset.store');

    Route::put('/admin/manage/assets/{id}/edit', [AssetController::class, 'update'])->name('admin.edit_asset');

    Route::delete('/admin/manage/assets/delete', [AssetController::class, 'destroy'])->name('asset.destroy');

    Route::get('/admin/view/borrowing-requests', [AdminController::class, 'borrowRequests'])->name('admin.view_borrowing_requests');

    Route::get('/admin/data/borrowing-requests', [BorrowRequestController::class, 'index'])->name('borrow_request.index');

    Route::patch('/admin/manage/borrowing-requests/{id}/approve', [BorrowRequestController::class, 'update'])->name('admin.approve_borrow_request');

    Route::patch('/admin/manage/borrowing-requests/{id}/reject', [BorrowRequestController::class, 'update'])->name('admin.reject_borrow_request');

    Route::delete('/admin/manage/borrowing-requests/{id}/delete', [BorrowRequestController::class, 'destroy'])->name('borrow_request.destroy');

    Route::get('/admin/view/users', [AdminController::class, 'users'])->name('admin.view_users');

});

