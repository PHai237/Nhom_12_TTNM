<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockOutController; // Thêm dòng này

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'manualLogin'])->name('login.submit');

Route::get('/', function () {
    if (session()->has('user')) {
        return view('welcome');
    } else {
        return redirect()->route('login');
    }
})->name('home');

// Nếu muốn có luôn route welcome
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Các route tính năng khác
Route::get('/products', function () { return view('product.index'); })->name('products');
Route::get('/producer', function () { return view('producer.index'); })->name('producer');
Route::get('/stockin', function () { return view('stockin.index'); })->name('stockin');

// Route quản lý xuất kho
Route::get('/stockout', function () { return view('stockout.index'); })->name('stockout');
Route::get('/stockout/create', function () { return view('stockout.create'); })->name('stockout.create');


Route::get('/inventory', function () { return view('inventory.index'); })->name('inventory');
Route::get('/stockin/create', function () { return view('stockin.create'); })->name('stockin.create');
Route::post('/stockin/store', function () {
    return redirect()->route('stockin');
})->name('stockin.store');
Route::get('/stockin/show', function () { return view('stockin.show'); })->name('stockin.show');
Route::get('/stockin', function () { return view('stockin.index'); })->name('stockin');
// File: routes/web.php
Route::get('/stockin-index1', function () {
    return view('stockin.index1');
})->name('stockin.index1');

