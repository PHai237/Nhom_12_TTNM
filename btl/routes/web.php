<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// ====== AUTH ROUTES ======
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'manualLogin'])->name('login.submit');
Route::get('/', function () {
    if (session()->has('user')) {
        return view('welcome');
    } else {
        return redirect()->route('login');
    }
})->name('home');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// ====== PRODUCT ROUTES ======
Route::get('/products', function () {
    return view('product.index');
})->name('products');

Route::get('/producer', function () {
    return view('producer.index');
})->name('producer');

// ====== STOCKIN ROUTES ======
Route::get('/stockin', function () { return view('stockin.index'); })->name('stockin');
Route::get('/stockin/create', function () { return view('stockin.create'); })->name('stockin.create');
Route::post('/stockin/store', function () { return redirect()->route('stockin'); })->name('stockin.store');
Route::get('/stockin/show', function () { return view('stockin.show'); })->name('stockin.show');
Route::get('/stockin-index1', function () { return view('stockin.index1'); })->name('stockin.index1');
Route::get('/stockin-edit', function () { return view('stockin.edit'); })->name('stockin.edit');
Route::get('/stockin-index2', function () { return view('stockin.index2'); })->name('stockin.index2');

// ====== STOCKOUT ROUTES ======
Route::get('/stockout', function () { return view('stockout.index'); })->name('stockout');
Route::get('/stockout/create', function () { return view('stockout.create'); })->name('stockout.create');
Route::get('/stockout/show', function () { return view('stockout.show'); })->name('stockout.show');
Route::get('/stockout-edit', function () { return view('stockout.edit'); })->name('stockout.edit');

// ====== INVENTORY ROUTES ======
Route::get('/inventory', function () {
    return view('inventory.index');
})->name('inventory');
