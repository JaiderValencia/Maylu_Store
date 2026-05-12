<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');
Route::view('/tienda', 'tienda')->name('tienda');
Route::view('/tendencias', 'tendencias')->name('tendencias');
Route::view('/producto', 'producto')->name('producto');
Route::view('/carrito', 'carrito')->name('carrito');
Route::view('/contacto', 'contact')->name('contacto');
Route::view('/login', 'login')->name('login');
Route::view('/about', 'about')->name('about');
