<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\AdminNewsController;
use App\Http\Controllers\Admin\DashboardController;


// Route mặc định chuyển hướng đến trang đăng ký
Route::get('/', function () {
    return redirect('register');
});


Route::middleware(['auth'])->group(function () {
    // Route cho khách hàng
    Route::prefix('customer')->group(function() {
        Route::get('dashboard/', [App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('customer.dashboard');
        Route::get('/company/{id}/products', [\App\Http\Controllers\Customer\DashboardController::class, 'showProductsByCompany'])->name('company.products');
    });    
    
    // Route cho admin
    Route::prefix('admin')->group(function () {
        Route::get('product/', [App\Http\Controllers\Admin\AdminNewsController::class, 'index'])->name('admin.product');
        Route::get('product/create', [App\Http\Controllers\Admin\AdminNewsController::class, 'create'])->name('admin.product_create');
        Route::post('product/store', [App\Http\Controllers\Admin\AdminNewsController::class, 'store'])->name('admin.product_store');
        Route::get('product/{id}', [App\Http\Controllers\Admin\AdminNewsController::class, 'show'])->name('admin.product_detail');
        Route::get('product/edit/{id}', [App\Http\Controllers\Admin\AdminNewsController::class, 'edit'])->name('admin.product_edit');
        Route::patch('product/update/{id}', [App\Http\Controllers\Admin\AdminNewsController::class, 'update'])->name('admin.product_update');
        Route::delete('product/delete/{id}', [App\Http\Controllers\Admin\AdminNewsController::class, 'destroy'])->name('admin.product_destroy');
    });
    
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
