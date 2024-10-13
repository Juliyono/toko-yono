<?php

use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Auth\AuthController; 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\User\UserController; 
use App\Http\Controllers\Admin\FlashsaleController;
 
// Guest Route 
Route::group(['middleware' => 'guest'], function() { 
    Route::get('/', function () { 
        return view('welcome'); 
    }); 
 
    Route::get('/register', [AuthController::class, 'register'])->name('register'); 
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register'); 
    Route::post('/post-login', [AuthController::class, 'login']); 
})->middleware('guest'); 
 
// Admin Route 
Route::group(['middleware' => 'admin'], function() { 
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard'); 
 
    // Product Route 
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product'); 

    // Create Product
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    // Detail Product
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

    // Edit Product
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');


    // Delete Product
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // Rute resource untuk ProductController
    Route::resource('admin/product', ProductController::class);

    // Rute untuk metode purchase
    Route::post('admin/product/{flashsaleId}/purchase', [ProductController::class, 'purchase'])->name('product.purchase');

    // Distributor Route
    Route::get('/Distributor', [DistributorController::class, 'index'])->name('admin.Distributor');

    // Distributor Route
    Route::get('/distributors', [DistributorController::class, 'index'])->name('admin.Distributor');
    Route::get('/distributors/{id}/detail', [DistributorController::class, 'detail'])->name('distributors.detail'); // Detail Distributor

    // Rute untuk Distributor Create
    Route::get('/distributors/create', [DistributorController::class, 'create'])->name('distributors.create');
    Route::post('/distributors/store', [DistributorController::class, 'store'])->name('distributors.store');

    // Rute untuk Distributor Edit
    Route::get('/distributors/edit/{id}', [DistributorController::class, 'edit'])->name('distributors.edit');
    Route::put('/distributors/update/{id}', [DistributorController::class, 'update'])->name('distributors.update');

    // Rute untuk Distributor Delete
    Route::delete('/distributors/delete/{id}', [DistributorController::class, 'destroy'])->name('distributors.delete');
    
    // Flash Sale Routes
    Route::get('/flashsales', [FlashsaleController::class, 'index'])->name('flashsales.index');
    Route::get('/flashsales/create', [FlashsaleController::class, 'create'])->name('flashsales.create');
    Route::post('/flashsales', [FlashsaleController::class, 'store'])->name('flashsales.store');
    Route::get('/flashsales/{id}', [FlashsaleController::class, 'detail'])->name('flashsales.detail');
    Route::get('/flashsales/{id}/edit', [FlashsaleController::class, 'edit'])->name('flashsales.edit'); // Mengedit flash sale
    Route::put('/flashsales/{id}', [FlashsaleController::class, 'update'])->name('flashsales.update');
    Route::delete('/flashsales/{id}', [FlashsaleController::class, 'delete'])->name('flashsales.delete'); // Menghapus flash sale


    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout'); 
})->middleware('admin'); 
 
// User Route 
Route::group(['middleware' => 'web'], function() { 
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    
    // Product Route
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']); 
    
    // Rute untuk detail produk flash sale
    Route::get('/user/flashsaledetail/{id}', [UserController::class, 'flashsaleDetail'])->name('user.flashsale.detail');

    Route::get('/product/purchase/{flashId}/{userId}', [UserController::class, 'purchaseCash'])->name('product.purchase');

    
    // Logout
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout'); 
})->middleware('web');

