<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Hiển thị form đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Xử lý đăng nhập thủ công (không cần DB)
Route::post('/login', [LoginController::class, 'manualLogin'])->name('login.submit');

// Trang chính sau đăng nhập
Route::get('/', function () {
    if (session()->has('user')) {
        return view('welcome'); // Hoặc 'welcome' nếu bạn muốn
    } else {
        return redirect()->route('login');
    }
})->name('home');


Route::get('/products', function () {
    return view('product.index');
})->name('products');
