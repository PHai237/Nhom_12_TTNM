<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Sản Phẩm - WEARLY</title>
  <style>
    :root {
      --green: #b7dfcc;
      --yellow: #faf3dd;
      --table-head: #a8d5ba;
      --main-radius: 18px;
      --main-shadow: 0 2px 14px 2px #dbe8e0;
    }

    body,
    html {
      margin: 0;
      height: 100%;
      background: var(--yellow);
    }

    * {
      box-sizing: border-box;
      font-family: 'Be Vietnam Pro', sans-serif;
    }

    .container {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .topbar {
      background: var(--green);
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 40px 0 0;
      position: relative;
      box-shadow: var(--main-shadow);
    }

    .left-group {
      display: flex;
      align-items: center;
      gap: 22px;
    }

    .wearly-logo {
      height: 52px;
      margin-left: 24px;
    }

    .menu-toggle {
      width: 36px;
      height: 27px;
      flex-direction: column;
      cursor: pointer;
      display: flex;
      gap: 6px;
    }

    .menu-toggle span {
      height: 5px;
      background: #222;
      border-radius: 2px;
    }

    .brand-name {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      font-size: 32px;
      font-weight: bold;
      color: #313131;
      letter-spacing: 2px;
      background: #fff;
      padding: 7px 42px 6px 42px;
      border-radius: 16px;
      box-shadow: var(--main-shadow);
    }

    .avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
    }

    .layout {
      display: flex;
      flex: 1;
      min-height: 0;
    }

    /* Sidebar vuông */
    .sidebar {
      background: var(--green);
      width: 180px;
      min-width: 180px;
      display: flex;
      flex-direction: column;
      gap: 6px;
      padding: 18px 0 0 0;
      box-shadow: var(--main-shadow);
      align-items: stretch;
      /* Không bo góc */
      border-radius: 0;
      transition: width 0.25s;
    }

    .sidebar-item {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 13px 18px;
      margin: 4px 8px;
      border-radius: 0;
      /* Vuông góc */
      color: #222;
      font-size: 17px;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      text-decoration: none;
    }

    .sidebar-item.active {
      background: #fff !important;
      color: #24a273 !important;
      font-weight: 700;
      box-shadow: 0 2px 12px #e0f5e6;
    }

    .sidebar-item.active span,
    .sidebar-item.active img {
      filter: none !important;
      color: #24a273 !important;
    }

    .sidebar-item:hover {
      background: #e0f5e6;
      color: #24a273;
      font-weight: 600;
    }

    .sidebar-item img {
      width: 30px;
      height: 30px;
    }

    .sidebar.hide {
      width: 70px !important;
      min-width: 70px !important;
      padding: 18px 0 0 0;
    }

    .sidebar.hide .sidebar-item span {
      display: none;
    }

    .sidebar.hide .sidebar-item {
      justify-content: center;
      padding: 13px 6px;
    }

    .main {
      flex: 1;
      background: var(--yellow);
      padding: 46px 0 0 0;
    }

    .content-box {
      width: 90%;
      background: #fff;
      border-radius: 20px;
      box-shadow: var(--main-shadow);
      padding: 38px 42px;
      margin: 0 auto;
    }

    .content-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
    }

    .content-header h1 {
      font-size: 34px;
      font-weight: bold;
      color: #222;
      margin: 0;
    }

    .action-bar {
      display: flex;
      align-items: center;
      gap: 18px;
    }

    .search-box {
      background: #e4f2ea;
      border-radius: 22px;
      display: flex;
      align-items: center;
      padding: 0 15px;
    }

    .search-box input {
      border: none;
      background: transparent;
      outline: none;
      font-size: 17px;
      width: 140px;
      padding: 9px 0;
    }

    .search-btn {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #2e8656;
      margin-left: 6px;
      transition: color 0.2s;
    }

    .search-btn:hover {
      color: #005640;
    }

    .add-btn {
      background: #9be6c8;
      color: #222;
      border: none;
      border-radius: 22px;
      padding: 7px 30px;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: background 0.2s;
    }

    .add-btn .icon {
      font-size: 20px;
    }

    .add-btn:hover {
      background: #7fd9b8;
    }

    .table-wrap {
      overflow-x: auto;
      margin-top: 6px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      margin-top: 0;
      border-radius: 13px;
      overflow: hidden;
      box-shadow: 0 2px 8px #e5e5e5;
    }

    th,
    td {
      border: 1px solid #d2e1d0;
      padding: 15px 16px;
      text-align: center;
      font-size: 17px;
    }

    th {
      background: var(--table-head);
      font-weight: bold;
      font-size: 18px;
      border-bottom: 3px solid #b7dfcc;
    }

    /* Nút Sửa/Xóa UI */
    .action-cell {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 12px;
    }

    .func-btn {
      background: #fff;
      border: 1.5px solid #24a273;
      color: #24a273;
      padding: 4px 15px;
      border-radius: 8px;
      font-size: 15px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: background 0.12s, color 0.12s, border 0.12s;
      font-weight: 500;
    }

    .func-btn:hover {
      background: #e4f2ea;
      color: #fff;
      border: 1.5px solid #228e5f;
    }

    .func-btn img {
      width: 18px;
      height: 18px;
    }

    @media (max-width: 1200px) {
      .content-box {
        padding: 18px 6px;
      }

      .main {
        padding: 20px 0;
      }

      .brand-name {
        font-size: 20px;
        padding: 6px 14px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="topbar">
      <div class="left-group">
        <img src="{{ asset('img/wearly_logo.png') }}" alt="Logo" class="wearly-logo">
        <div class="menu-toggle" onclick="toggleSidebar()">
          <span></span><span></span><span></span>
        </div>
      </div>
      <div class="brand-name">WEARLY</div>
      <img src="{{ asset('img/user_avt.png') }}" class="avatar" alt="Avatar">
    </div>
    <div class="layout">
      <!-- Sidebar dùng lại cho mọi trang -->
      <div class="sidebar" id="sidebar">
        <a href="{{ route('home') }}"
          class="sidebar-item {{ request()->is('/') ? 'active' : '' }}">
          <img src="{{ asset('img/home.png') }}"><span>Trang chủ</span>
        </a>
        <a href="{{ route('products') }}"
          class="sidebar-item {{ request()->is('products') ? 'active' : '' }}">
          <img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span>
        </a>
        <a href="{{ route('producer') }}"
          class="sidebar-item {{ request()->is('producer') ? 'active' : '' }}">
          <img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span>
        </a>
        <a href="{{ route('stockin') }}"
          class="sidebar-item {{ request()->is('stockin') ? 'active' : '' }}">
          <img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span>
        </a>
        <a href="{{ route('stockout') }}"
          class="sidebar-item {{ request()->is('stockout') ? 'active' : '' }}">
          <img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span>
        </a>
        <a href="{{ route('inventory') }}"
          class="sidebar-item {{ request()->is('inventory') ? 'active' : '' }}">
          <img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span>
        </a>
      </div>
      <!-- Nội dung chính -->
      <div class="main">
        <div class="content-box">
          <div class="content-header">
            <h1>Quản Lý Sản Phẩm</h1>
            <div class="action-bar">
              <div class="search-box">
                <input type="text" placeholder="Tìm kiếm" id="searchInput">
                <button class="search-btn" title="Tìm kiếm">&#128269;</button>
              </div>
              <button class="add-btn"><span class="icon">➕</span>Thêm</button>
            </div>
          </div>
          <div class="table-wrap">
            <table id="stockinTable">
              <thead>
                <tr>
                  <th>Mã phiếu nhập</th>
                  <th>Ngày nhập</th>
                  <th>Mã nhân viên</th>
                  <th>Nhà cung cấp</th>
                  <th>Tổng sản phẩm</th>
                  <th>Tổng giá trị</th>
                  <th>Chức năng</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>MPN001</td>
                  <td>8/06/2025</td>
                  <td>NV001</td>
                  <td>MCC003</td>
                  <td>3</td>
                  <td>1.500.000đ</td>
                  <td>
                    <button class="func-btn">Xem <span class="icon">👁️</span></button>
                    <button class="func-btn">Xoá <span class="icon">🗑️</span></button>
                  </td>
                </tr>
                <tr>
                  <td>MPN002</td>
                  <td>9/06/2025</td>
                  <td>NV002</td>
                  <td>MCC002</td>
                  <td>1</td>
                  <td>800.000đ
                  </td>
                  <td>
                    <button class="func-btn">Xem <span class="icon">👁️</span></button>
                    <button class="func-btn">Xoá <span class="icon">🗑️</span></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('hide');
    }
    // Tìm kiếm realtime
    document.getElementById('searchInput').addEventListener('keyup', function() {
      let input = this.value.toLowerCase();
      let trs = document.querySelectorAll('#productTable tbody tr');
      trs.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(input) ? '' : 'none';
      });
    });
  </script>
</body>

</html>