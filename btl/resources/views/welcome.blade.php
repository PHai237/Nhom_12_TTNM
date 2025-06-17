<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trang Quản Lý - WEARLY</title>
  <style>
    :root {
      --green: #a8d5ba;
      --green-light: #b7dfcc;
      --green-dark: #24a273;
      --yellow: #faf3dd;
      --main-shadow: 0 2px 14px 2px #dbe8e0;
    }
    html, body { margin: 0; padding: 0; height: 100%; background: var(--yellow);}
    * { box-sizing: border-box; font-family: 'Be Vietnam Pro', Arial, sans-serif;}
    .layout { display: flex; min-height: 100vh; }

    /* ==== TOPBAR ==== */
    .topbar {
      background: var(--green);
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: var(--main-shadow);
      padding: 0 38px 0 0;
      position: relative;
      z-index: 101;
    }
    .topbar .left-group {
      display: flex;
      align-items: center;
      gap: 22px;
    }
    .wearly-logo {
      height: 54px;
      margin-left: 24px;
      border-radius: 50%;
      background: #fff;
      object-fit: cover;
      border: 2px solid #fff;
      box-shadow: 0 1px 5px #dbe8e0;
    }
    .menu-toggle {
      width: 36px;
      height: 27px;
      flex-direction: column;
      cursor: pointer;
      display: flex;
      gap: 6px;
      margin-left: 6px;
    }
    .menu-toggle span {
      height: 5px;
      background: #222;
      border-radius: 2px;
    }
    .brand-name {
      position: absolute;
      left: 50%; transform: translateX(-50%);
      font-size: 32px; font-weight: bold;
      color: #313131; letter-spacing: 2px;
      padding: 7px 42px 6px 42px;
      border-radius: 16px;
    }
    .avatar {
      width: 52px; height: 52px;
      border-radius: 50%; object-fit: cover;
      border: 3px solid #fff;
      background: #fff;
    }

    /* ==== SIDEBAR ==== */
    .sidebar {
      background: var(--green-light);
      width: 180px;
      min-width: 180px;
      height: 100vh;
      display: flex;
      flex-direction: column;
      gap: 6px;
      align-items: stretch;
      padding: 18px 0 0 0;
      box-shadow: var(--main-shadow);
      border-radius: 0 28px 28px 0;
      transition: width 0.25s;
      z-index: 99;
    }
    .sidebar.hide { width: 70px !important; min-width: 70px !important; }
    .sidebar.hide .sidebar-item span { display: none; }
    .sidebar.hide .sidebar-item { justify-content: center; padding: 13px 6px;}
    .sidebar-item {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 13px 18px;
      margin: 4px 8px;
      border-radius: 12px;
      color: #222;
      font-size: 17px;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      text-decoration: none;
    }
    .sidebar-item.active {
      background: #fff !important;
      color: var(--green-dark) !important;
      font-weight: 700;
      box-shadow: 0 2px 12px #e0f5e6;
    }
    .sidebar-item.active span, .sidebar-item.active img {
      filter: none !important; color: var(--green-dark) !important;
    }
    .sidebar-item:hover {
      background: #e0f5e6; color: var(--green-dark); font-weight: 600;
    }
    .sidebar-item img { width: 30px; height: 30px;}
    .sidebar-item span {font-size: 17px; font-weight: 500;}

    /* ==== MAIN CONTENT (DASHBOARD) ==== */
    .main {
      flex: 1;
      background: var(--yellow);
      padding: 64px 0 0 0;
      min-height: 100vh;
    }
    .dashboard-content {
      width: 90%;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 40px;
    }
    .function-block {
      background-color: #a8d5ba;
      border-radius: 20px;
      height: 180px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 20px;
      cursor: pointer;
      transition: transform 0.3s;
      text-decoration: none;
      box-shadow: 0 2px 12px #dbe8e0;
    }
    .function-block:hover { transform: scale(1.05);}
    .function-block img { width: 70px; height: 70px;}
    .function-block p { font-size: 18px; color: #000; margin: 0;}
    @media (max-width: 900px) {
      .dashboard-content { width: 99vw; gap: 20px; }
      .main { padding: 20px 0 0 0;}
      .sidebar { width: 70px; min-width: 70px;}
      .sidebar-item span { display: none;}
    }
  </style>
</head>
<body>
  <div class="topbar">
    <div class="left-group">
      <img src="{{ asset('img/wearly_logo.png') }}" class="wearly-logo" alt="Logo">
      <div class="menu-toggle" onclick="toggleSidebar()">
        <span></span><span></span><span></span>
      </div>
    </div>
    <div class="brand-name">WEARLY</div>
    <img src="{{ asset('img/user_avt.png') }}" class="avatar" alt="Avatar">
  </div>
  <div class="layout">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <a href="/" class="sidebar-item active">
        <img src="{{ asset('img/home.png') }}"><span>Trang chủ</span>
      </a>
      <a href="{{ route('products') }}" class="sidebar-item">
        <img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span>
      </a>
      <a href="{{ route('producer') }}" class="sidebar-item">
        <img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span>
      </a>
      <a href="{{ route('stockin') }}" class="sidebar-item">
        <img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span>
      </a>
      <a href="{{ route('stockout') }}" class="sidebar-item">
        <img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span>
      </a>
      <a href="{{ route('inventory') }}" class="sidebar-item">
        <img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span>
      </a>
    </div>
    <!-- Main (Dashboard blocks) -->
    <div class="main">
      <div class="dashboard-content">
        <a href="{{ route('products') }}" class="function-block">
          <img src="{{ asset('img/product.png') }}">
          <p>Quản lý sản phẩm</p>
        </a>
        <a href="{{ route('producer') }}" class="function-block">
          <img src="{{ asset('img/producer.png') }}">
          <p>Quản lý nhà cung cấp</p>
        </a>
        <a href="{{ route('stockin') }}" class="function-block">
          <img src="{{ asset('img/stock_in.png') }}">
          <p>Quản lý nhập kho</p>
        </a>
        <a href="{{ route('stockout') }}" class="function-block">
          <img src="{{ asset('img/stock_out.png') }}">
          <p>Quản lý xuất kho</p>
        </a>
        <a href="{{ route('inventory') }}" class="function-block">
          <img src="{{ asset('img/inventory_report.png') }}">
          <p>Báo cáo thống kê</p>
        </a>
      </div>
    </div>
  </div>
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('hide');
    }
  </script>
</body>
</html>
<