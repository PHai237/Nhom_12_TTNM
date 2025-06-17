<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Báo cáo - WEARLY</title>
  <style>
    :root {
      --green: #b7dfcc;
      --yellow: #faf3dd;
      --table-head: #a8d5ba;
      --main-shadow: 0 2px 14px 2px #dbe8e0;
    }
    body, html { margin: 0; background: var(--yellow);}
    * { box-sizing: border-box; font-family: 'Be Vietnam Pro', Arial, sans-serif;}
    .container { min-height: 100vh; display: flex; flex-direction: column;}
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
    .left-group { display: flex; align-items: center; gap: 22px;}
    .wearly-logo { height: 52px; margin-left: 24px; border-radius: 50%;}
    .menu-toggle { width: 36px; height: 27px; flex-direction: column; cursor: pointer; display: flex; gap: 6px;}
    .menu-toggle span { height: 5px; background: #222; border-radius: 2px; }
    .brand-name {
      position: absolute; left: 50%; transform: translateX(-50%);
      font-size: 32px; font-weight: bold; color: #313131; letter-spacing: 2px;
      background: #fff; padding: 7px 42px 6px 42px; border-radius: 16px; box-shadow: var(--main-shadow);
    }
    .avatar { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 3px solid #fff;}
    .layout { display: flex; flex: 1; min-height: 0;}
    .sidebar {
      background: var(--green); width: 200px; min-width: 200px;
      display: flex; flex-direction: column; gap: 6px; padding: 18px 0 0 0;
      box-shadow: var(--main-shadow); align-items: stretch; border-radius: 0;
    }
    .sidebar-item { display: flex; align-items: center; gap: 14px; padding: 13px 18px; margin: 4px 8px; color: #222; font-size: 17px; cursor: pointer; text-decoration: none; border-radius: 6px; transition: background 0.2s, color 0.2s;}
    .sidebar-item.active, .sidebar-item.selected { background: #fff; color: #24a273; font-weight: 700;}
    .sidebar-item img { width: 26px; height: 26px;}
    .sidebar-item:hover { background: #e0f5e6; color: #24a273;}
    .sidebar-submenu { margin-left: 12px; border-left: 2px solid #d7eedf; padding-left: 15px; display: flex; flex-direction: column; gap: 6px; }
    .sidebar-subitem { display: flex; align-items: center; gap: 9px; font-size: 15px; color: #222; cursor: pointer; border-radius: 6px; padding: 7px 0 7px 2px; margin: 0;}
    .sidebar-subitem.active, .sidebar-subitem.selected { color: #24a273; background: #fff;}
    .sidebar-subitem:hover { color: #24a273; background: #e0f5e6;}
    /* Main content */
    .main { flex: 1; background: var(--yellow); padding: 46px 0 0 0; }
    .content-box {
      width: 82%; background: #fff; border-radius: 20px;
      box-shadow: var(--main-shadow); padding: 38px 42px; margin: 0 auto;
      min-height: 600px;
    }
    .content-header { margin-bottom: 24px;}
    .content-header h1 { font-size: 42px; font-weight: bold; color: #222; margin: 0;}
    /* Bộ lọc */
    .filter-bar {
      display: flex; align-items: center; gap: 18px;
      margin-bottom: 18px;
      flex-wrap: wrap;
    }
    .filter-label { font-size: 17px; font-weight: 500; margin-right: 4px;}
    .filter-bar select, .filter-bar input[type="date"] {
      background: var(--green); border: none; border-radius: 7px;
      padding: 5px 13px; font-size: 16px; color: #222; outline: none; font-family: inherit;
      min-width: 120px;
    }
    .filter-bar button {
      background: var(--green);
      color: #222;
      border: none;
      border-radius: 8px;
      padding: 7px 24px;
      font-size: 17px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.15s, color 0.15s;
      box-shadow: 0 1px 4px #e7f2ec7a;
      outline: none;
    }
    .filter-bar button:hover {
      background: #a8d5ba;
      color: #198754;
    }
    /* Table */
    .table-wrap { overflow-x: auto; margin-top: 12px; }
    table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 13px; overflow: hidden; }
    th, td { border: 1px solid #d2e1d0; padding: 10px 13px; text-align: center; font-size: 17px;}
    th { background: var(--table-head); font-weight: bold; font-size: 17px;}
    /* Responsive */
    @media (max-width: 1200px) {
      .content-box { padding: 14px 2px; width: 99vw;}
      .main { padding: 8px 0;}
      .brand-name { font-size: 20px; padding: 6px 14px;}
      th, td { font-size: 13px; padding: 5px 4px;}
    }
  </style>
</head>
<body>
<div class="container">
  <!-- TOPBAR -->
  <div class="topbar">
    <div class="left-group">
      <img src="https://i.imgur.com/ZbL9qUO.png" alt="Logo" class="wearly-logo">
      <div class="menu-toggle" onclick="toggleSidebar()">
        <span></span><span></span><span></span>
      </div>
    </div>
    <div class="brand-name">WEARLY</div>
    <img src="https://i.imgur.com/Dng9FgB.png" class="avatar" alt="Avatar">
  </div>
  <div class="layout">
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
      <a href="#" class="sidebar-item"><img src="https://i.imgur.com/AlwF9gF.png"><span>Trang chủ</span></a>
      <a href="#" class="sidebar-item"><img src="https://i.imgur.com/RQwTpwT.png"><span>Quản lý sản phẩm</span></a>
      <a href="#" class="sidebar-item"><img src="https://i.imgur.com/v3D0Feq.png"><span>Quản lý nhà cung cấp</span></a>
      <a href="#" class="sidebar-item"><img src="https://i.imgur.com/W5IB8un.png"><span>Quản lý nhập kho</span></a>
      <a href="#" class="sidebar-item"><img src="https://i.imgur.com/yZIr0aD.png"><span>Quản lý xuất kho</span></a>
      <div class="sidebar-item active" id="reportMenu">
        <img src="https://i.imgur.com/UPLDDNi.png"><span>Báo cáo thống kê</span>
        <span style="margin-left:auto;font-size:15px;">&#9660;</span>
      </div>
      <div class="sidebar-submenu" id="reportSubMenu" style="display:block;">
        <div class="sidebar-subitem active" onclick="showTab('baoCaoTonKho', this)">Báo cáo tồn kho</div>
        <div class="sidebar-subitem" onclick="showTab('danhSachNhap', this)">Danh sách phiếu nhập kho</div>
        <div class="sidebar-subitem" onclick="showTab('danhSachXuat', this)">Danh sách phiếu xuất kho</div>
      </div>
    </div>
    <!-- MAIN -->
    <div class="main">
      <div class="content-box">
        <!-- Báo cáo tồn kho -->
        <div id="baoCaoTonKhoTab" class="tab-content">
          <div class="content-header"><h1>Báo cáo tồn kho</h1></div>
          <div class="filter-bar">
            <span class="filter-label">Từ</span>
            <select><option>01/01/2025</option><option>01/02/2025</option><option>01/03/2025</option></select>
            <span class="filter-label">Đến</span>
            <select><option>31/03/2025</option><option>28/02/2025</option><option>31/01/2025</option></select>
            <span class="filter-label">Mã hàng</span>
            <select><option>Tất cả</option><option>SP0001</option><option>SP0002</option><option>SP0003</option></select>
            <button>Xem</button>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th rowspan="2">Mã sản phẩm</th>
                  <th rowspan="2">Tên sản phẩm</th>
                  <th colspan="2">Tồn đầu kỳ</th>
                  <th colspan="2">Nhập trong kỳ</th>
                  <th colspan="2">Xuất trong kỳ</th>
                  <th colspan="2">Tồn cuối kỳ</th>
                </tr>
                <tr>
                  <th>Số lượng</th><th>Thành tiền</th>
                  <th>Số lượng</th><th>Thành tiền</th>
                  <th>Số lượng</th><th>Thành tiền</th>
                  <th>Số lượng</th><th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>SP0001</td><td>Áo phông</td><td>20</td><td>2.000.000</td><td>10</td><td>1.000.000</td><td>25</td><td>2.500.000</td><td>5</td><td>500.000</td></tr>
                <tr><td>SP0002</td><td>Áo dài tay</td><td>5</td><td>750.000</td><td>10</td><td>1.500.000</td><td>8</td><td>1.200.000</td><td>7</td><td>1.050.000</td></tr>
                <tr><td>SP0003</td><td>Áo nỉ</td><td>10</td><td>2.000.000</td><td>12</td><td>2.400.000</td><td>22</td><td>4.400.000</td><td>0</td><td>0</td></tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Danh sách phiếu nhập kho -->
        <div id="danhSachNhapTab" class="tab-content" style="display:none;">
          <div class="content-header"><h1>Danh sách phiếu nhập kho</h1></div>
          <div class="filter-bar">
            <span class="filter-label">Từ</span>
            <select><option>01/01/2025</option></select>
            <span class="filter-label">Đến</span>
            <select><option>31/03/2025</option></select>
            <span class="filter-label">Nhà cung cấp</span>
            <select><option>Tất cả</option><option>Hà Thành</option><option>Mặc Tinh</option><option>Flora</option></select>
            <button>Xem</button>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>STT</th><th>Ngày nhập</th><th>Số phiếu</th><th>Nhà cung cấp</th><th>Số lượng</th><th>Thành tiền</th><th>Thuế VAT</th><th>Tổng cộng</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>01</td><td>01/01/2025</td><td>NK0001</td><td>Hà Thành</td><td>50</td><td>3.500.000</td><td>350.000</td><td>3.850.000</td></tr>
                <tr><td>02</td><td>02/02/2025</td><td>NK0002</td><td>Mặc Tinh</td><td>20</td><td>2.000.000</td><td>200.000</td><td>2.200.000</td></tr>
                <tr><td>03</td><td>03/03/2025</td><td>NK0003</td><td>Flora</td><td>30</td><td>4.500.000</td><td>360.000</td><td>4.860.000</td></tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Danh sách phiếu xuất kho -->
        <div id="danhSachXuatTab" class="tab-content" style="display:none;">
          <div class="content-header"><h1>Danh sách phiếu xuất kho</h1></div>
          <div class="filter-bar">
            <span class="filter-label">Từ</span>
            <select><option>01/01/2025</option></select>
            <span class="filter-label">Đến</span>
            <select><option>31/03/2025</option></select>
            <span class="filter-label">Mã nhân viên</span>
            <select><option>Tất cả</option><option>NV0001</option><option>NV0002</option><option>NV0003</option></select>
            <button>Xem</button>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>STT</th><th>Ngày nhập</th><th>Số phiếu</th><th>Mã nhân viên</th><th>Số lượng</th><th>Thành tiền</th><th>Thuế VAT</th><th>Tổng cộng</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>01</td><td>01/01/2025</td><td>XK0001</td><td>NV0001</td><td>50</td><td>3.500.000</td><td>350.000</td><td>3.850.000</td></tr>
                <tr><td>02</td><td>02/02/2025</td><td>XK0002</td><td>NV0002</td><td>20</td><td>2.000.000</td><td>200.000</td><td>2.200.000</td></tr>
                <tr><td>03</td><td>03/03/2025</td><td>XK0003</td><td>NV0003</td><td>30</td><td>4.500.000</td><td>360.000</td><td>4.860.000</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Xử lý hiển thị tab
  function showTab(tab, el) {
    // Ẩn tất cả tab content
    document.getElementById('baoCaoTonKhoTab').style.display = 'none';
    document.getElementById('danhSachNhapTab').style.display = 'none';
    document.getElementById('danhSachXuatTab').style.display = 'none';
    // Bỏ active các sidebar subitem
    let items = document.querySelectorAll('.sidebar-subitem');
    items.forEach(i => i.classList.remove('active'));
    // Hiện đúng tab, active đúng mục
    if(tab === 'baoCaoTonKho') {
      document.getElementById('baoCaoTonKhoTab').style.display = '';
    }
    if(tab === 'danhSachNhap') {
      document.getElementById('danhSachNhapTab').style.display = '';
    }
    if(tab === 'danhSachXuat') {
      document.getElementById('danhSachXuatTab').style.display = '';
    }
    el.classList.add('active');
  }
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('hide');
  }
</script>
</body>
</html>
