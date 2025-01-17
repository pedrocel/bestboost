<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as ProductLibraryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\ControllerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\PerfilController;

Route::middleware(['auth'])->group(function () {
    // Listar Perfis
    Route::get('/perfis', [PerfilController::class, 'index'])->name('perfis.index');
    Route::get('/perfis/create', [PerfilController::class, 'create'])->name('perfis.create');
    Route::post('/perfis', [PerfilController::class, 'store'])->name('perfis.store');
    Route::get('/perfis/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfis.edit');
    Route::put('/perfis/{perfil}', [PerfilController::class, 'update'])->name('perfis.update');
    Route::delete('/perfis/{perfil}', [PerfilController::class, 'destroy'])->name('perfis.destroy');

    Route::get('/organizacoes', [OrganizationController::class, 'index'])->name('organizacoes.index');
    Route::get('/organizacoes/create', [OrganizationController::class, 'create'])->name('organizacoes.create');
    Route::post('/organizacoes', [OrganizationController::class, 'store'])->name('organizacoes.store');
    Route::get('/organizacoes/{organizacao}/edit', [OrganizationController::class, 'edit'])->name('organizacoes.edit');
    Route::put('/organizacoes/{organizacao}', [OrganizationController::class, 'update'])->name('organizacoes.update');
    Route::delete('/organizacoes/{organizacao}', [OrganizationController::class, 'destroy'])->name('organizacoes.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin/produtos')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/criar', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    Route::prefix('/admin/categorias')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/criar', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::prefix('/produtos')->group(function () {
        Route::get('/', [ProductLibraryController::class, 'index'])->name('products.index');
        Route::get('/detail/{id}', [ProductLibraryController::class, 'detail'])->name('products.detail');
    });

    Route::prefix('/admin/lojas')->group(function () {
        Route::get('/', [StoreController::class, 'index'])->name('admin.stores.index');
        Route::get('/criar', [StoreController::class, 'create'])->name('admin.stores.create');
        Route::post('/', [StoreController::class, 'store'])->name('admin.stores.store');
        Route::get('{id}', [StoreController::class, 'show'])->name('admin.stores.show');
        Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.stores.edit');
        Route::put('{id}', [StoreController::class, 'update'])->name('admin.stores.update');
        Route::delete('{id}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');
    });

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/favoritar-produto/{id}', [ProductLibraryController::class, 'toggleFavorite'])->name('product.toggleFavorite');

});
require __DIR__.'/auth.php';
