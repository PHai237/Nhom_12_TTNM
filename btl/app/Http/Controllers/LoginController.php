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
    // LoginController.php

    public function manualLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === '123456') {
            Session::put('user', $username);
            // Chỉ redirect về /
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }
        return back()->withErrors(['username' => 'Tài khoản hoặc mật khẩu sai.']);
    }
}
