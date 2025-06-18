<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý xuất kho - WEARLY</title>
  <style>
    :root {
        --dark:#000;
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
    /* ==== MAIN CONTENT ==== */
    .main {
      flex: 1;
      background: var(--yellow);
      padding: 46px 0 0 0;
    }
    .content-header {
      width: 90%;
      margin: 0 auto 4px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .content-box {
      width: 90%;
      border-radius: 20px;
      padding: 8px 42px 38px 42px;
      margin: 0 auto;
    }
    .content-header h1 {
      font-size: 42px; 
      font-weight: bold;
      color: #222;
      letter-spacing: 1px;
      margin: 0;
    }
    .action-bar {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .search-box {
      background: var(--green);
      border-radius: 22px;
      display: flex;
      align-items: center;
      padding: 0 15px;
    }
    .search-box input {
      border: none; background: transparent; outline: none; font-size: 17px;
      width: 140px; padding: 9px 0;
    }
    .search-btn {
      background: none; border: none; font-size: 20px; cursor: pointer;
      color: #2e8656; margin-left: 6px; transition: color 0.2s;
    }
    .search-box input {
  border: none;
  background: transparent;
  outline: none;
  font-size: 17px;
  width: 140px;
  padding: 9px 0;
  text-align: center;    /* Thêm dòng này để căn giữa chữ */
}
    .search-btn:hover { color: #005640; }
.add-btn {
  background: var(--green);
  color: #000;
  border: none;
  border-radius: 22px;
  padding: 8px 18px;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: background 0.2s, color 0.2s;
  min-width: 80px;
}

    .add-btn .icon img { width: 20px; height: 20px; }
    .add-btn:hover { background: #7fd9b8;}
    .table-wrap { overflow-x: auto; margin-top: 6px;}
    .table-wrap {
      margin-top: 6px;
      overflow-x: auto;
      border-radius: 0;
      padding: 10px;
      box-shadow: none;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
      border: 1px solid #000;
      border-radius: 0;
      overflow: hidden;
      font-size: 16px;
      font-weight: 500;
      color: #222;
    }
    thead tr th {
      border-bottom: 1px solid #000;
      border-right: 1px solid #000;
      padding: 10px 8px;
      text-align: center;
      font-weight: 600;
      background-color: #ffffff;
      user-select: none;
    }
    thead tr th:last-child {
      border-right: none;
    }
    tbody tr td {
      border-bottom: 1px solid #000;
      border-right: 1px solid #000;
      padding: 10px 12px;
      text-align: center;
      vertical-align: middle;
      user-select: text;
    }
    tbody tr td:last-child {
      border-right: none;
    }
    tbody tr:last-child td {
      border-bottom: none;
    }
    tbody tr.selected {
      background-color: #b7dfcc !important;
      font-weight: 600;
    }
    tbody tr:hover {
      background-color: #d1e8d3;
      cursor: pointer;
    }
    /* ==== BUTTONS SỬA XÓA ==== */
    .action-btns {
      display: flex;
      gap: 6px;
      justify-content: center;
    }
.btn-small {
  background: #fff;
  color: #222;
  border: 1px solid #222;     /* viền đen */
  border-radius: 14px;
  padding: 5px 12px 5px 7px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 4px;
  box-shadow: 0 1px 3px #d7ebdf;
  transition: background 0.17s, color 0.17s;
  min-width: 0;
}

    .btn-small .icon img {
      width: 16px;
      height: 16px;
      display: block;
      margin: 0 0 0 2px;
    }
    .btn-small.edit-btn:hover {
      background: #c0f7d2;
      color: #228e5f;
    }
    .btn-small.delete-btn:hover {
      background: #ffe0e0;
      color: #b30000;
    }
    /* ==== BOTTOM BUTTONS ==== */
    .bottom-action-bar {
      position: fixed;
      right: 40px;
      bottom: 36px;
      display: flex;
      gap: 28px;
      z-index: 999;
    }
    .round-btn {
      background: #e4f2ea;
      color: #222;
      border: none;
      border-radius: 22px;
      padding: 13px 40px 13px 25px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 1px 7px #d7ebdf;
      transition: background 0.17s, color 0.17s;
    }
    .round-btn .icon {
      font-size: 23px;
      margin-right: 5px;
      margin-left: -9px;
    }
    .edit-btn:hover {
      background: #c0f7d2;
      color: #228e5f;
    }
    .view-btn:hover {
      background: #e4f2ea;
      color:#2e8656;
    }
    .delete-btn:hover {
      background: #ffe0e0;
      color: #b30000;
    }
    @media (max-width: 900px) {
      .content-box { width: 99vw; padding: 7px 2px;}
      .main { padding: 8px 0;}
      .content-header h1 { font-size: 22px;}
      th, td { font-size: 12px; padding: 6px 6px;}
      .bottom-action-bar { right: 6px; bottom: 8px;}
      .round-btn { font-size: 14px; padding: 7px 9px;}
    }
    .popup-overlay {
  position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.18);
  display: flex; align-items: center; justify-content: center;
  z-index: 9999;
  transition: opacity .2s;
}
.popup-content {
  background: var(--green);
  border-radius: 20px;
  box-shadow: 0 4px 24px #b7dfcc93;
  min-width: 320px; max-width: 85vw;
  min-height: 125px;
  padding: 32px 32px 28px 32px;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  animation: popIn .22s cubic-bezier(.7,1.7,.6,1);
}
@keyframes popIn {
  from {transform: scale(.8); opacity: 0;}
  to {transform: scale(1); opacity: 1;}
}
.popup-content .close-btn {
  position: absolute; top: 16px; right: 16px;
  background: transparent; border: none;
  font-size: 25px; color: #fff; cursor: pointer;
  line-height: 1;
  transition: color .2s;
}
.popup-content .close-btn:hover { color: #222;}
.popup-title {
  color: #fff;
  font-size: 23px;
  font-weight: 500;
  text-align: center;
  margin-bottom: 22px;
  margin-top: 6px;
  line-height: 1.4;
}
.popup-actions {
  display: flex;
  gap: 80px;
  margin-top: 6px;
  justify-content: center;
}
.popup-actions button {
  min-width: 92px;
  border: none;
  outline: none;
  border-radius: 16px;
  padding: 9px 0;
  font-size: 17px;
  font-weight: 500;
  cursor: pointer;
  transition: background .18s, color .18s;
}
.confirm-btn {
  background: #fff; color: var(-dark);
  border: 2px solid var(--green-dark);
}
.confirm-btn:hover { background: #d0f2e3; }
.cancel-btn {
  background: #f7f7f7; color: #444; border: 2px solid #e0e0e0;
}
.cancel-btn:hover { background: #ffeaea; color: #e65757; }

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
      <div class="main">
        <div class="content-header">
          <h1>Quản Lý Nhập Kho</h1>
          <div class="action-bar">
            <div class="search-box">
              <input type="text" placeholder="Tìm kiếm" id="searchInput">
              <button class="search-btn" title="Tìm kiếm">
                <img src="{{ asset('img/search.png') }}" alt="Tìm kiếm" style="width:24px;height:24px;">
              </button>
            </div>
            <button class="add-btn" id="addBtn">Thêm<span class="icon"><img src="{{ asset('img/add.png') }}"></span></button>
          </div>
        </div>
        <div class="content-box">
          <div class="table-wrap">
            <table id="stockoutTable">
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
                    <div class="action-btns">
                         <button class="btn-small view-btn">Xem
                             <img src="{{ asset('img/eye.png') }}" alt="Xem" class="icon"> 
                         </button>
                        <button class="btn-small delete-btn">Xóa
                            <img src="{{ asset('img/delete.png') }}" alt="Xóa" class="icon"> 
                        </button>
                    </div>
                  </td>
                </tr>
                 <tr>
                  <td>MPN002</td>
                  <td>9/06/2025</td>
                  <td>NV002</td>
                  <td>MCC002</td>
                  <td>1</td>
                  <td>800.000đ</td>
                  <td>
                    <div class="action-btns">
                         <button class="btn-small view-btn">Xem
                             <img src="{{ asset('img/eye.png') }}" alt="Xem" class="icon"> 
                         </button>
                        <button class="btn-small delete-btn">Xóa
                            <img src="{{ asset('img/delete.png') }}" alt="Xóa" class="icon"> 
                        </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>MPN003</td>
                  <td>10/06/2025</td>
                  <td>NV003</td>
                  <td>MCC001</td>
                  <td>1</td>
                  <td>3.160.000đ</td>
                  <td>
                    <div class="action-btns">
                         <button class="btn-small view-btn1">Xem
                             <img src="{{ asset('img/eye.png') }}" alt="Xem" class="icon"> 
                         </button>
                        <button class="btn-small delete-btn">Xóa
                            <img src="{{ asset('img/delete.png') }}" alt="Xóa" class="icon"> 
                        </button>
                    </div>
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
    let rowToDelete = null;

// Gán sự kiện cho tất cả nút xóa sau khi DOM đã tải
document.querySelectorAll('.delete-btn').forEach(btn => {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    // Lưu lại tr, để xóa khi xác nhận
    rowToDelete = btn.closest('tr');
    document.getElementById('deletePopup').style.display = 'flex';
  });
});

function closePopup() {
  document.getElementById('deletePopup').style.display = 'none';
  rowToDelete = null;
}

function confirmDelete() {
  if (rowToDelete) rowToDelete.remove();
  closePopup();
  showDeleteSuccessPopup();
}

function showDeleteSuccessPopup() {
  document.getElementById('deleteSuccessPopup').style.display = 'flex';
}

function closeDeleteSuccessPopup() {
  document.getElementById('deleteSuccessPopup').style.display = 'none';
}


    // Sidebar thu gọn/mở rộng
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('hide');
    }
    // Tìm kiếm realtime
    document.getElementById('searchInput').addEventListener('keyup', function() {
      let input = this.value.toLowerCase();
      let trs = document.querySelectorAll('#stockoutTable tbody tr');
      trs.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(input) ? '' : 'none';
      });
    });
    // Sidebar active
    document.querySelectorAll('.sidebar-item').forEach(item => {
      item.addEventListener('click', function(e) {
        document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
      });
    });
    // Nút Thêm (demo điều hướng)
    document.getElementById('addBtn').onclick = function() {
       window.location.href = "{{ route('stockin.create') }}";
       };
       document.querySelectorAll('.view-btn1').forEach(btn => {
  btn.addEventListener('click', function() {
    window.location.href = "{{ route('stockin.show') }}";
  });
});
  </script>
</body>
<!-- Popup xác nhận xóa -->
<div id="deletePopup" class="popup-overlay" style="display: none;">
  <div class="popup-content">
    <button class="close-btn" onclick="closePopup()">&times;</button>
    <div class="popup-title">Bạn muốn xóa<br>phiếu nhập này?</div>
    <div class="popup-actions">
      <button class="confirm-btn" onclick="confirmDelete()">Xác nhận</button>
      <button class="cancel-btn" onclick="closePopup()">Hủy</button>
    </div>
  </div>
</div>
<div id="deleteSuccessPopup" class="popup-overlay" style="display: none;">
  <div class="popup-content" style="background: #a8d5ba;">
    <button class="close-btn" onclick="closeDeleteSuccessPopup()">&times;</button>
    <div class="popup-title" style="color: #fff; font-weight:600;">
      Xóa phiếu nhập thành công!
    </div>
  </div>
</div>
</html>
