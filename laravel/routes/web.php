<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\Admin\PrendaController;

Route::get('/', [publicController::class, 'index'])->name('home');
Route::get('/tienda', [publicController::class, 'tienda'])->name('tienda');
Route::get('/tendencias', [publicController::class, 'tendencias'])->name('tendencias');
Route::get('/producto', [publicController::class, 'producto'])->name('producto');
Route::get('/carrito', [publicController::class, 'carrito'])->name('carrito');
Route::get('/contacto', [publicController::class, 'contacto'])->name('contacto');
Route::get('/login', [publicController::class, 'login'])->name('login');
Route::get('/about', [publicController::class, 'about'])->name('about');

Route::prefix('admin')->name('admin.')->group(function () {
	Route::resource('prendas', PrendaController::class)->except(['show']);
});

Route::get('/panel', [adminController::class, 'panel'])->name('panel');