<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Models\Supplier;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

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
    Route::get('/staff/{id}/edit', [AdminController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/{id}', [AdminController::class, 'update'])->name('staff.update.process');
    Route::delete('/staff/{id}', [AdminController::class, 'destroy'])->name('staff.delete');

    // Product
    Route::get('/product/list', [ProductController::class, 'product'])->name('product.list');
    Route::get('/product/add', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/product/store', [ProductController::class, 'storeProduct'])->name('store.product');
    Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->name('edit.product');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('destroy.product');

    // Category List
    Route::get('/category/list', [CategoryController::class, 'category'])->name('category.list');
    Route::get('/catgory/add', [CategoryController::class, 'addCategory'])->name('add.category');
    Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('store.category');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');

    // supplier
    Route::get('/supplier/list', [SupplierController::class, 'supplier'])->name('supplier.list');
    Route::get('/supplier/add', [SupplierController::class, 'addSupplier'])->name('add.supplier');
    Route::post('/supplier/store', [SupplierController::class, 'supplierStore'])->name('store.supplier');
    Route::get('/supplier/{id}/edit',[SupplierController::class, 'edit'])->name('edit.supplier');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('update.supplier');
    Route::delete('/supplier/{id}',[SupplierController::class, 'destroy'])->name('destroy.supplier');


});

Route::prefix('customer')->group( function() {
    // Route::get('/login', [])
    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('/register/process', [CustomerController::class, 'registerProcess'])->name('customer.register.process');
});

