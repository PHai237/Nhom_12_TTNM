<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Wearly - Trang Chào</title>
  <style>
    body, html { margin: 0; padding: 0; height: 100%; background: #e4e4e4; font-family: 'Be Vietnam Pro', sans-serif; box-sizing: border-box; }
    .container-bg { position: absolute; top: 80px; left: 0; right: 0; bottom: 0; width: 100vw; height: calc(100vh - 80px);
     background: url('img/login.png') center/cover no-repeat; z-index: 1; display: flex; align-items: stretch; justify-content: stretch;}
    .overlay { width: 33.33vw; min-width: 320px; max-width: 600px; height: 100%; background: rgba(47, 47, 47, 0.47);
      display: flex; flex-direction: column; align-items: center; justify-content: center; position: absolute; top: 0; right: 0; bottom: 0;}
    .welcome-content { color: #fff; text-align: center; margin: 0; max-width: 440px;}
    .welcome-content h1 { font-size: 44px; font-weight: bold; margin-bottom: 22px; margin-top: 0; letter-spacing: 1px; }
    .welcome-content p { font-size: 22px; font-weight: 400; margin-top: 0; line-height: 1.3;}
    .header-bar { background: #faf3dd; height: 80px; width: 100vw; display: flex; align-items: center; justify-content: space-between;
      padding: 0 38px 0 28px; box-sizing: border-box; position: fixed; left: 0; right: 0; top: 0; z-index: 100; border: 3px solid #5ec09c;}
    .logo { height: 64px; }
    .login-link { font-size: 22px; color: #222; font-weight: 600; cursor: pointer; text-decoration: none; letter-spacing: 1px; transition: color .2s;}
    .login-link:hover { color: #0a7d55; text-decoration: underline; }
    .modal-bg { display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 500; background: rgba(0,0,0,0.3); align-items: center; justify-content: center;}
    .modal-bg.active { display: flex; }
    .login-box { background: rgba(28,28,28,0.89); box-shadow: 0 8px 38px #4444; border-radius: 22px; padding: 38px 52px 36px 52px; min-width: 350px; display: flex; flex-direction: column; align-items: center; animation: popup .25s cubic-bezier(.5,1.6,.5,1);}
    @keyframes popup { 0% { transform: translateY(-50px) scale(.85); opacity: 0; } 100% { transform: none; opacity: 1; } }
    .login-box h2 { color: #fff; font-size: 32px; font-weight: bold; margin-bottom: 28px; margin-top: 0; letter-spacing: 2px; text-align: center; }
    .login-box input { display: block; width: 340px; margin: 13px 0; font-size: 18px; border-radius: 9px; border: none; outline: none; padding: 12px 18px; background: #fff; }
    .login-box button { margin-top: 22px; font-size: 19px; padding: 10px 38px; background: #faf3dd; border: none; border-radius: 14px; font-weight: bold; cursor: pointer; color: #222; transition: background 0.18s;}
    .login-box button:hover { background: #b7dfcc;}
    .blur-bg { filter: blur(3.5px) brightness(0.88); transition: filter .24s; pointer-events: none; user-select: none; }
    @media (max-width: 900px) { .welcome-content h1 { font-size: 30px; } .welcome-content { margin-right: 20px;} .login-box { min-width: 210px; padding: 18px 8vw; } .login-box input { width: 55vw; } }
  </style>
</head>
<body>
  <div class="header-bar">
    <img src="img/wearly_logo.png" class="logo" alt="WEARLY Logo" />
    <a class="login-link" onclick="showLogin()">Đăng Nhập</a>
  </div>
  <div class="container-bg" id="bg-main">
    <div style="flex: 1"></div>
    <div class="overlay" id="overlay-greeting">
      <div class="welcome-content">
        <h1>WEARLY</h1>
        <p>Giải pháp quản lý kho thời trang<br>dễ dàng và tinh tế.</p>
      </div>
    </div>
  </div>
  <!-- Modal đăng nhập -->
  <div class="modal-bg" id="modalLogin">
    <form class="login-box" id="loginForm" method="POST" action="/login">
      @csrf
      <h2>ĐĂNG NHẬP</h2>
      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <button type="submit">Đăng nhập</button>
      @if($errors->any())
        <div style="color:#fff;margin-top:15px;">{{ $errors->first() }}</div>
      @endif
    </form>
  </div>
  <script>
    function showLogin() {
      document.getElementById('modalLogin').classList.add('active');
      document.getElementById('bg-main').classList.add('blur-bg');
      document.getElementById('overlay-greeting').style.display = 'none';
    }
    function hideLogin() {
      document.getElementById('modalLogin').classList.remove('active');
      document.getElementById('bg-main').classList.remove('blur-bg');
      document.getElementById('overlay-greeting').style.display = '';
    }
    document.getElementById('modalLogin').onclick = function(e) {
      if (e.target === this) hideLogin();
    }
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') hideLogin();
    });
    // Nếu có lỗi từ server, tự động bật modal đăng nhập lại

   
  </script>
</body>
</html>
