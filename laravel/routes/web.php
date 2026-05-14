<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\Admin\PrendaController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\TallaController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [publicController::class, 'index'])->name('home');
Route::get('/tienda', [publicController::class, 'tienda'])->name('tienda');
Route::get('/tendencias', [publicController::class, 'tendencias'])->name('tendencias');
Route::get('/producto', [publicController::class, 'producto'])->name('producto');
Route::get('/carrito', [publicController::class, 'carrito'])->name('carrito');
Route::get('/contacto', [publicController::class, 'contacto'])->name('contacto');
Route::get('/about', [publicController::class, 'about'])->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/panel', [adminController::class, 'panel'])->name('panel');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('prendas', PrendaController::class)->except(['show']);
        
        Route::get('categorias/{categoria}/reassign', [CategoriaController::class, 'reassign'])->name('categorias.reassign');
        Route::post('categorias/{categoria}/reassign', [CategoriaController::class, 'processReassign'])->name('categorias.process_reassign');
        Route::resource('categorias', CategoriaController::class)->except(['show']);
        
        Route::resource('tallas', TallaController::class)->except(['show']);
    });
});