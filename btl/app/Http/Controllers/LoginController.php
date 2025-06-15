<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Hiển thị form
    public function showLoginForm()
    {
        return view('login.index1');
    }

    // Xử lý đăng nhập không cần DB
    public function manualLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Tài khoản mặc định
        if ($username === 'admin' && $password === '123456') {
            // Lưu session giả
            Session::put('user', $username);
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['username' => 'Tài khoản hoặc mật khẩu sai.']);
    }
}
