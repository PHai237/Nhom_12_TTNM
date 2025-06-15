<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wearly - Trang Chào</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body, html {
      height: 100%;
      width: 100%;
    }

    .header {
      width: 100%;
      height: 80px;
      background-color: #fff7dd;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 40px;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .header img {
      height: 60px;
    }

    .header a {
      text-decoration: none;
      color: #000;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
    }

    .banner {
      position: relative;
      width: 100%;
      height: 100vh;
background-image: url("{{ asset('img/login.png') }}");
      background-size: cover;
      background-position: center;
    }

    .overlay {
      position: absolute;
      top: 0;
      right: 0;
      width: 45%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.55);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding: 80px;
      color: #fff;
    }

    .overlay h1 {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .overlay p {
      font-size: 20px;
      line-height: 1.6;
    }

    .login-modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0,0,0,0.6);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .login-box {
      background-color: rgba(0, 0, 0, 0.85);
      padding: 40px;
      border-radius: 20px;
      width: 400px;
      color: #fff;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 28px;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border-radius: 6px;
      border: none;
      font-size: 16px;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: #fff;
      color: #000;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-box button:hover {
      background-color: #eee;
    }

    @media (max-width: 768px) {
      .overlay {
        width: 100%;
        padding: 40px 20px;
        text-align: center;
        align-items: center;
      }

      .login-box {
        width: 90%;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <img src="{{ asset('img/wearly_logo.png') }}" alt="Logo Wearly" />
    <a onclick="showLogin()">Đăng Nhập</a>
  </div>

  <!-- Banner -->
  <div class="banner">
    <div class="overlay">
      <h1>WEARLY</h1>
      <p>Giải pháp quản lý kho thời trang<br>dễ dàng và tinh tế.</p>
    </div>
  </div>

  <!-- Login Modal -->
  <div class="login-modal" id="loginModal">
    <div class="login-box">
      <h2>ĐĂNG NHẬP</h2>
      @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
      @endif
      <form method="POST" action="{{ url('/login') }}">
        @csrf
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
      </form>
    </div>
  </div>

  <script>
    function showLogin() {
      document.getElementById('loginModal').style.display = 'flex';
    }

    function hideLogin() {
      document.getElementById('loginModal').style.display = 'none';
    }

    window.onclick = function(e) {
      const modal = document.getElementById('loginModal');
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    }

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        hideLogin();
      }
    });
  </script>
</body>
</html>
