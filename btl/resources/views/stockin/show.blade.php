<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Xem phiếu nhập - WEARLY</title>
  <style>
    :root {
      --dark: #000;
      --green: #a8d5ba;
      --green-light: #b7dfcc;
      --green-dark: #24a273;
      --yellow: #faf3dd;
      --main-shadow: 0 2px 14px 2px #dbe8e0;
    }
    html, body { margin: 0; padding: 0; height: 100%; background: var(--yellow);}
    * { box-sizing: border-box; font-family: 'Be Vietnam Pro', Arial, sans-serif;}
    .container { min-height: 100vh; }
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
    .left-group {
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
    .layout { display: flex; min-height: calc(100vh - 80px);}
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
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      background: #fffbe6;
      padding: 36px 0;
    }
    .detail-card {
      background: #fff;
      border-radius: 16px;
      padding: 34px 56px 26px 56px;
      width: 950px;
      min-height: 500px;
      margin-top: 18px;
      box-shadow: 0 2px 16px #dbebdf5a;
    }
    .detail-title {
      font-size: 32px;
      text-align: center;
      margin-bottom: 34px;
      font-weight: 600;
    }
.info-grid {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-bottom: 32px;
}
.info-row {
  display: grid;
  grid-template-columns: 170px 190px 170px 190px;
  align-items: center;
  gap: 5px 34px;
}

    .info-row.right {
  justify-content: flex-end;
}
    .info-label {
      min-width: 120px;
      color: #333;
      font-size: 18px;
      font-weight: 500;
    }
    .info-value {
      background: #d4ebdd;
      border-radius: 16px;
      padding: 7px 28px;
      color: #4b6957;
      font-size: 18px;
      font-weight: 600;
      border: none;
    }
    .detail-table-wrap {
      max-height: 170px;
      overflow-y: auto;
      border-radius: 8px;
      border: 1.5px solid #b7dfcc;
      margin-bottom: 24px;
      background: #fff;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }
    th, td {
      border: 1px solid #444;
      padding: 12px 14px;
      text-align: center;
      font-size: 17px;
    }
    th {
      background: #fafcfa;
      font-weight: 600;
      color: #222;
    }
    .table-footer {
      display: flex;
      justify-content: flex-end;
      gap: 40px;
      margin-top: 16px;
      align-items: center;
    }
    .footer-row {
      display: flex;
      align-items: center;
      gap: 16px;
      font-size: 18px;
      margin-bottom: 8px;
    }
    .footer-value {
         width: 160px; 
      background: #d4ebdd;
      border-radius: 16px;
      padding: 7px 28px;
 color: #7ca68a;  
      font-weight: 600;
      min-width: 120px;
  text-align: center;
    }
    .action-bar {
      display: flex;
      justify-content: flex-end;
      gap: 18px;
      margin-top: 20px;
    }
    .btn-main, .btn-sub {
      border-radius: 18px;
      border: none;
      outline: none;
      font-size: 18px;
      padding: 9px 34px;
      font-weight: 500;
      cursor: pointer;
      transition: background .16s, color .16s;
      background: #d8f5e3;
      color: #2b5f3d;
    }
    .btn-sub {
      background: #e6ede4;
      color: #333;
      margin-right: 8px;
      text-decoration: none;
      display: inline-block;
    }
    .btn-main:hover {
      background: #b7dfcc;
      color: #222;
    }
    .btn-sub:hover {
      background: #f1efe9;
      color: #1b3321;
    }
    
  </style>
</head>
<body>
<div class="container">
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
    <div class="sidebar" id="sidebar">
      <a href="/" class="sidebar-item"><img src="{{ asset('img/home.png') }}"><span>Trang chủ</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span></a>
      <a href="#" class="sidebar-item active"><img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/home.png') }}"><span>Báo cáo thống kê</span></a>
    </div>
    <div class="main-content">
      <div class="detail-card">
        <div class="detail-title">Xem phiếu nhập MPN003</div>
<div class="info-grid">
  <div class="info-row">
    <div class="info-label">Mã phiếu nhập</div>
    <div class="info-value">MPN003</div>
    <div class="info-label">Mã nhân viên</div>
    <div class="info-value">NV003</div>
  </div>
  <div class="info-row">
    <div class="info-label">Ngày nhập</div>
    <div class="info-value">
      10/6/2025
      <img src="{{ asset('img/calendar.png') }}" style="width:20px;vertical-align:middle;margin-left:6px;">
    </div>
    <div class="info-label">Mã nhà cung cấp</div>
    <div class="info-value">MCC001</div>
  </div>
</div>


        <div class="detail-table-wrap">
          <table>
            <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>SP0001</td>
                <td>Áo phông</td>
                <td>90</td>
                <td>49.000đ</td>
              </tr>
              <tr>
                <td>SP0004</td>
                <td>Khăn</td>
                <td>50</td>
                <td>29.000đ</td>
              </tr>
            </tbody>
          </table>
        </div>
<div class="table-footer" style="flex-direction: column; align-items: flex-end; gap: 20px;">
  <div class="footer-row">
    <span>Tổng sản phẩm</span>
    <span class="footer-value">2</span>
  </div>
  <div class="footer-row">
    <span>Tổng giá trị</span>
    <span class="footer-value">5.860.000đ</span>
  </div>
</div>


        <div class="action-bar">
          <a href="{{ url('/stockin-index1') }}" class="btn-sub">Quay lại</a>

          <button id="editBtn" class="btn-main">
  Sửa <img src="{{ asset('img/edit.png') }}" style="width:22px;vertical-align:middle;margin-left:6px;">
</button>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Sidebar thu gọn/mở rộng (giống index)
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('hide');
  }
  // Sidebar active
  document.querySelectorAll('.sidebar-item').forEach(item => {
    item.addEventListener('click', function(e) {
      document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
      this.classList.add('active');
    });
  });
   // Điều hướng sang trang edit
  document.getElementById('editBtn').onclick = function() {
window.location.href = "{{ url('/stockin-edit') }}";

    // window.location.href = "/duong-dan-toi-edit-tren-web.php"; // Nếu là route Laravel
  }
</script>
</body>
</html>
