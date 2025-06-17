<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Báo cáo tồn kho - WEARLY</title>
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
      <img src="{{ asset('img/wearly_logo.png') }}" class="wearly-logo" alt="Logo">
      <div class="menu-toggle" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="brand-name">WEARLY</div>
    <img src="{{ asset('img/user_avt.png') }}" class="avatar" alt="Avatar">
  </div>
    <div class="layout">
      <!-- SIDEBAR -->
   <div class="sidebar" id="sidebar">
      <a href="/" class="sidebar-item active">
        <img src="{{ asset('img/home.png') }}"><span>Trang chủ</span>
      </a>
      <a href="#" class="sidebar-item">
        <img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span>
      </a>
      <a href="#" class="sidebar-item">
        <img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span>
      </a>
      <a href="#" class="sidebar-item">
        <img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span>
      </a>
      <a href="#" class="sidebar-item">
        <img src="{{ asset('img/Stock_out.png') }}"><span>Quản lý xuất kho</span>
      </a>
      <a href="#" class="sidebar-item">
        <img src="{{ asset('img/home.png') }}"><span>Báo cáo thống kê</span>
      </a>
      <div class="sidebar-submenu" id="reportSubMenu" style="display:block;">
        <div class="sidebar-subitem active">Báo cáo tồn kho</div>
        <div class="sidebar-subitem">Danh sách phiếu nhập kho</div>
        <div class="sidebar-subitem">Danh sách phiếu xuất kho</div>
      </div>
    </div>
     
    <!-- MAIN -->
    <div class="main">
      <div class="content-box">
        <div class="content-header">
          <h1>Báo cáo tồn kho</h1>
        </div>
        <div class="filter-bar">
          <span class="filter-label">Từ</span>
          <select id="dateFrom">
            <option>01/01/2025</option>
            <option>01/02/2025</option>
            <option>01/03/2025</option>
          </select>
          <span class="filter-label">Đến</span>
          <select id="dateTo">
            <option>31/03/2025</option>
            <option>28/02/2025</option>
            <option>31/01/2025</option>
          </select>
          <span class="filter-label">Mã hàng</span>
          <select id="productSelect">
            <option>Tất cả</option>
            <option>SP0001</option>
            <option>SP0002</option>
            <option>SP0003</option>
          </select>
          <button id="btnView">Xem</button>
        </div>
        <div class="table-wrap" id="reportTableWrap" style="display: none;">
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
            <tbody id="reportTbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Dữ liệu mẫu cho báo cáo
  const data = [
    {
      code: 'SP0001',
      name: 'Áo phông',
      startQty: 20, startVal: 2000000,
      inQty: 10, inVal: 1000000,
      outQty: 25, outVal: 2500000,
      endQty: 5, endVal: 500000,
    },
    {
      code: 'SP0002',
      name: 'Áo dài tay',
      startQty: 5, startVal: 750000,
      inQty: 10, inVal: 1500000,
      outQty: 8, outVal: 1200000,
      endQty: 7, endVal: 1050000,
    },
    {
      code: 'SP0003',
      name: 'Áo nỉ',
      startQty: 10, startVal: 2000000,
      inQty: 12, inVal: 2400000,
      outQty: 22, outVal: 4400000,
      endQty: 0, endVal: 0,
    }
  ];

  document.getElementById('btnView').onclick = function() {
    // Lấy mã hàng chọn
    let code = document.getElementById('productSelect').value;
    let rows = data.filter(row => code === "Tất cả" || row.code === code);
    let tbody = "";
    rows.forEach(row => {
      tbody += `<tr>
        <td>${row.code}</td>
        <td>${row.name}</td>
        <td>${row.startQty}</td><td>${numberFormat(row.startVal)}</td>
        <td>${row.inQty}</td><td>${numberFormat(row.inVal)}</td>
        <td>${row.outQty}</td><td>${numberFormat(row.outVal)}</td>
        <td>${row.endQty}</td><td>${numberFormat(row.endVal)}</td>
      </tr>`;
    });
    document.getElementById('reportTbody').innerHTML = tbody;
    document.getElementById('reportTableWrap').style.display = "";
  };
  function numberFormat(n) {
    return n.toLocaleString("vi-VN");
  }
  // Sidebar mở/đóng sub-menu
  document.getElementById("reportMenu").onclick = function() {
    let sub = document.getElementById("reportSubMenu");
    sub.style.display = (sub.style.display === "none") ? "block" : "none";
  };
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('hide');
  }
</script>
</body>
</html>
