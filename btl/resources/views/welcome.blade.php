<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Trang Quản Lý</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Be Vietnam Pro', sans-serif;
    }

    body, html {
      margin: 0;
      height: 100%;
    }

    .bo-co-tn-kho {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .topbar {
      height: 80px;
      background-color: #a8d5ba;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    }

    .left-group {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .wearly-logo {
      height: 50px;
    }

    .menu-toggle {
      width: 30px;
      height: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      cursor: pointer;
    }

    .menu-toggle span {
      height: 4px;
      background: #000;
      border-radius: 2px;
    }

    .brand-name {
      font-size: 28px;
      font-weight: bold;
      color: #000;
    }

    .avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .layout {
      display: flex;
      flex: 1;
    }

    .sidebar {
      background-color: #a8d5ba;
      width: 220px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      transition: all 0.3s ease;
    }

    .sidebar.hide {
      width: 70px;
      padding: 20px 10px;
    }

    .sidebar-item {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 16px;
      color: #000;
      white-space: nowrap;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .sidebar.hide .sidebar-item span {
      display: none;
    }

    .sidebar-item img {
      width: 24px;
      height: 24px;
    }

    .main {
      flex: 1;
      background-color: #faf3dd;
      padding: 60px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
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
    }

    .function-block:hover {
      transform: scale(1.05);
    }

    .function-block img {
      width: 70px;
      height: 70px;
    }

    .function-block p {
      font-size: 18px;
      color: #000;
      margin: 0;
    }
  </style>
</head>
<body>
  <div class="bo-co-tn-kho">
    <!-- Topbar -->
    <div class="topbar">
      <div class="left-group">
        <img src="./img/wearly_logo.png" class="wearly-logo" alt="Logo">
        <div class="menu-toggle" onclick="toggleSidebar()">
          <span></span><span></span><span></span>
        </div>
        <div class="brand-name">WEARLY</div>
      </div>
      <img src="./img/user_avt.png" class="avatar" alt="Avatar">
    </div>

    <!-- Layout -->
    <div class="layout">
      <!-- Sidebar -->
      <div class="sidebar" id="sidebar">
        <div class="sidebar-item">
          <img src="./img/product.png"><span>Quản lý sản phẩm</span>
        </div>
        <div class="sidebar-item">
          <img src="./img/producer.png"><span>Quản lý nhà cung cấp</span>
        </div>
        <div class="sidebar-item">
          <img src="./img/stock_in.png"><span>Quản lý nhập kho</span>
        </div>
        <div class="sidebar-item">
          <img src="./img/stock_out.png"><span>Quản lý xuất kho</span>
        </div>
        <div class="sidebar-item">
          <img src="./img/inventory_report.png"><span>Báo cáo thống kê</span>
        </div>
      </div>

      <!-- Main Content -->
      <div class="main">
        <div class="function-block">
          <img src="./img/product.png">
          <p>Quản lý sản phẩm</p>
        </div>
        <div class="function-block">
          <img src="./img/producer.png">
          <p>Quản lý nhà cung cấp</p>
        </div>
        <div class="function-block">
          <img src="./img/stock_in.png">
          <p>Quản lý nhập kho</p>
        </div>
        <div class="function-block">
          <img src="./img/stock_out.png">
          <p>Quản lý xuất kho</p>
        </div>
        <div class="function-block">
          <img src="./img/inventory_report.png">
          <p>Báo cáo thống kê</p>
        </div>
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
