<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'manualLogin'])->name('login.submit');

Route::get('/', function () {
    if (session()->has('user')) {
        return view('welcome');
    } else {
        return redirect()->route('login');
    }
})->name('home');

// (Nếu muốn có luôn route welcome)
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Các route tính năng khác
Route::get('/products', function () { return view('product.index'); })->name('products');
Route::get('/producer', function () { return view('producer.index'); })->name('producer');
Route::get('/stockin', function () { return view('stockin.index'); })->name('stockin');
Route::get('/stockout', function () { return view('stockout.index'); })->name('stockout');
Route::get('/inventory', function () { return view('inventory.index'); })->name('inventory');
