<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductImportController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Models\Product;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\UserAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $products = Product::latest()
        ->take(5)
        ->get();

    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([
    'auth',
    'role:admin,vendor'
])->group(function () {

    Route::get(
        '/admin/products',
        [ProductAdminController::class, 'index']
    )->name('admin.products.index');

    Route::get(
        '/admin/products/create',
        [ProductAdminController::class, 'create']
    )->name('admin.products.create');

    Route::post(
        '/admin/products',
        [ProductAdminController::class, 'store']
    )->name('admin.products.store');

    Route::get(
        '/admin/products/{product}/edit',
        [ProductAdminController::class, 'edit']
    )->name('admin.products.edit');

    Route::put(
        '/admin/products/{product}',
        [ProductAdminController::class, 'update']
    )->name('admin.products.update');

    Route::delete(
        '/admin/products/{product}',
        [ProductAdminController::class, 'destroy']
    )->name('admin.products.destroy');

});

Route::middleware([
    'auth',
    'role:admin,editor'
])->group(function () {

    Route::get(
        '/admin/reviews',
        [ReviewAdminController::class,'index']
    )->name('admin.reviews.index');

    Route::get(
        '/admin/reviews/{review}/edit',
        [ReviewAdminController::class,'edit']
    )->name('admin.reviews.edit');

    Route::put(
        '/admin/reviews/{review}',
        [ReviewAdminController::class,'update']
    )->name('admin.reviews.update');

    Route::delete(
        '/admin/reviews/{review}',
        [ReviewAdminController::class,'destroy']
    )->name('admin.reviews.destroy');

});

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {

    Route::get(
        '/admin/users',
        [UserAdminController::class,'index']
    )->name('admin.users.index');

    Route::get(
        '/admin/users/{user}/edit',
        [UserAdminController::class,'edit']
    )->name('admin.users.edit');

    Route::put(
        '/admin/users/{user}',
        [UserAdminController::class,'update']
    )->name('admin.users.update');

    Route::delete(
        '/admin/users/{user}',
        [UserAdminController::class,'destroy']
    )->name('admin.users.destroy');

});

Route::get('/import-products', [ProductImportController::class, 'showForm'])
    ->middleware('auth');

Route::post('/import-products', [ProductImportController::class, 'import'])
    ->name('products.import')
    ->middleware('auth');

require __DIR__.'/auth.php';
