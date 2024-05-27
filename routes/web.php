<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/admin/process')

Route::get('admin/login', [LoginController::class, 'adminLoginShow']) -> name('admin.login.show');

Route::post('/admin/login/process',[LoginController::class, 'adminLogin'])->name('admin.login.process');

Route::middleware(['admin'])->group( function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']) -> name('admin.dashboard');

    // add staff //
    Route::get('/staff', [AdminController::class, 'staffList'])->name('admin.staff.list');
    Route::get('/add/staff', [AdminController::class, 'addStaff'])->name('admin.add.staff.show');
    Route::post('/staff/store', [AdminController::class, 'staffStore'])->name('staff.store');
    Route::get('/staff/list/show', [AdminController::class, 'staffListShow'])->name('staff.list.show');
});

Route::prefix('customer')->group( function() {
    // Route::get('/login', [])
    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('/register/process', [CustomerController::class, 'registerProcess'])->name('customer.register.process');
});

