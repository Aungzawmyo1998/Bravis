<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Livewire\Cart;
use App\Models\OrderProduct;
use App\Models\Role;
use App\Models\Supplier;

Route::get('/', function () {
    return view('welcome');
});


// live wire test

Route::get('/index', function () {
    return view('customers.index');
});

// Customers
Route::get('/customer/login', [LoginController::class, 'customerLogin'])->name('customer.login');
Route::post('/customer/login', [LoginController::class, 'customerLoginProcess'])->name('customer.login.process');
Route::get('/customer/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/customer/store', [CustomerController::class, 'registerProcess'])->name('store.customer');
Route::get('/customer/logout', [CustomerController::class, 'logout']) -> name('custoemr.logout');

// products
Route::get('/customer/allproduct', [HomeController::class, 'allProduct'])->name('customer.allproduct');
Route::get('/customer/product/men', [HomeController::class, 'menProduct'])->name('customer.men.product');
Route::get('/customer/product/women', [HomeController::class, 'womenProduct'])->name('customer.women.product');
Route::get('/customer/product/{id}/detail',[HomeController::class, 'productDetail'])->name('customer.product.detail');

// cart

Route::middleware(['customer'])->group( function ( ) {

    Route::post('/product/{id}/add/cart', [CartController::class, 'addCart'])->name('product.add.cart');
    // Route::post('/update/cart', [CartController::class, 'updateCart'])->name('update.cart');
    // Route::post('/addtocart/increment',[CartController::class, 'addToCartInc'])->name('addToCartInc');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/delete', [CartController::class, 'deleteProduct'])->name('cart.delefte');


});

// Route::get('/customer/men/tees')


// customer home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/login', [LoginController::class, 'adminLoginShow']) -> name('admin.login.show');

Route::post('/admin/login/process',[LoginController::class, 'adminLogin'])->name('admin.login.process');

Route::middleware(['admin'])->group( function () {
    // dashboard //
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']) -> name('admin.dashboard');

    // add staff //
    Route::get('/staff', [AdminController::class, 'staffList'])->name('admin.staff.list');
    Route::get('/add/staff', [AdminController::class, 'addStaff'])->name('admin.add.staff.show');
    Route::post('/staff/store', [AdminController::class, 'staffStore'])->name('staff.store');
    Route::get('/staff/list/show', [AdminController::class, 'staffListShow'])->name('staff.list.show');
    Route::get('/staff/{id}/edit', [AdminController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/{id}', [AdminController::class, 'update'])->name('staff.update.process');
    Route::delete('/staff/{id}', [AdminController::class, 'destroy'])->name('staff.delete');
    Route::get('staff/logout',[AdminController::class, 'logout'])->name('staff.logout');
    ROute::post('/staff/search',[AdminController::class, 'search'])->name('staff.search');


    // Product
    Route::get('/product/list', [ProductController::class, 'product'])->name('product.list');
    Route::get('/product/add', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/product/store', [ProductController::class, 'storeProduct'])->name('store.product');
    Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->name('edit.product');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('destroy.product');
    Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');

    // Category List
    Route::get('/category/list', [CategoryController::class, 'category'])->name('category.list');
    Route::get('/catgory/add', [CategoryController::class, 'addCategory'])->name('add.category');
    Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('store.category');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');

    Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');

    // supplier
    Route::get('/supplier/list', [SupplierController::class, 'supplier'])->name('supplier.list');
    Route::get('/supplier/add', [SupplierController::class, 'addSupplier'])->name('add.supplier');
    Route::post('/supplier/store', [SupplierController::class, 'supplierStore'])->name('store.supplier');
    Route::get('/supplier/{id}/edit',[SupplierController::class, 'edit'])->name('edit.supplier');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('update.supplier');
    Route::delete('/supplier/{id}',[SupplierController::class, 'destroy'])->name('destroy.supplier');
    Route::get('/supplier/search', [SupplierController::class, 'search'])->name('supplier.search');

    // Order
    Route::get('/order/list', [OrderProduct::class, 'order'])->name('order.list');

    // customer
    Route::get('/customer/list', [CustomerController::class, 'customer'])->name('customer.list');
    Route::delete('/customer/{id}', [CustomerController::class , 'destroy'])->name('destroy.custome');
    Route::post('/customer/search', [CustomerController::class, 'search'])->name('search.customer');
});

// Route::prefix('customer')->group( function() {
//     // Route::get('/login', [])
//     Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
//     Route::post('/register/process', [CustomerController::class, 'registerProcess'])->name('customer.register.process');

// });


// Customers
// Route::get('/home')

