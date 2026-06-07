<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductImportController;
use App\Http\Controllers\Admin\ProductAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    Route::get(
        '/admin/products',
        [ProductAdminController::class, 'index']
    )->name('admin.products.index');

    Route::get(
        '/admin/products/{product}/edit',
        [ProductAdminController::class, 'edit']
    )->name('admin.products.edit');

    Route::put(
        '/admin/products/{product}',
        [ProductAdminController::class, 'update']
    )->name('admin.products.update');

});

Route::get('/import-products', [ProductImportController::class, 'showForm'])
    ->middleware('auth');

Route::post('/import-products', [ProductImportController::class, 'import'])
    ->name('products.import')
    ->middleware('auth');

require __DIR__.'/auth.php';
