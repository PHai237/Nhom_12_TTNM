<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Sản Phẩm - WEARLY</title>
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
      background: #fff;
      padding: 7px 42px 6px 42px;
      border-radius: 16px;
      box-shadow: var(--main-shadow);
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
    .content-box {
      width: 90%;
      background: #fff;
      border-radius: 20px;
      box-shadow: var(--main-shadow);
      padding: 38px 42px;
      margin: 0 auto;
    }
.content-header{
  width: 90%;
  margin: 0 auto 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.content-header h1 {
  font-size: 42px; 
  font-weight: bold;
  color: #222;
  letter-spacing: 1px;
  margin: 0;
}

    .content-header h1 {
      font-size: 42px; font-weight: bold; color: #222; margin: 0;
      letter-spacing: 1px;
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
      border: none; background: transparent; outline: none; font-size: 17px;
      width: 140px; padding: 9px 0;
    }
    .search-btn {
      background: none; border: none; font-size: 20px; cursor: pointer;
      color: #2e8656; margin-left: 6px; transition: color 0.2s;
    }
    .search-btn:hover { color: #005640; }
    .add-btn {
      background: #9be6c8; color: #222; border: none; border-radius: 22px;
      padding: 7px 30px; font-size: 18px; font-weight: 600; cursor: pointer;
      display: flex; align-items: center; gap: 6px; transition: background 0.2s;
    }
    .add-btn .icon { font-size: 20px;}
    .add-btn:hover { background: #7fd9b8;}
    .table-wrap { overflow-x: auto; margin-top: 6px;}
  .table-wrap {
  margin-top: 6px;
  overflow-x: auto;
  background: #fff8de; /* nền vàng kem giống hình */
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

/* Hiệu ứng tương tác vẫn giữ nguyên */
tbody tr.selected {
  background-color: #b7dfcc !important;
  font-weight: 600;
}

tbody tr:hover {
  background-color: #d1e8d3;
  cursor: pointer;
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
    .delete-btn:hover {
      background: #ffe0e0;
      color: #b30000;
    }
    /* ==== POPUP ===== */
    .popup-overlay {
      position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.14);
      display: flex; align-items: center; justify-content: center;
      z-index: 10000;
      transition: opacity .2s;
    }
    .popup {
      background: var(--green);
      border-radius: 20px;
      box-shadow: 0 4px 24px #b7dfcc93;
      min-width: 320px; max-width: 85vw;
      min-height: 125px;
      padding: 28px 22px 28px 22px;
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
    .popup .close-btn {
      position: absolute; top: 14px; right: 14px;
      background: transparent; border: none;
      font-size: 26px; color: #fff; cursor: pointer;
      line-height: 1;
      transition: color .2s;
    }
    .popup .close-btn:hover { color: #222;}
    .popup-title {
      color: #fff;
      font-size: 22px;
      font-weight: 500;
      text-align: center;
      margin-bottom: 22px;
      margin-top: 12px;
    }
    .popup-actions {
      display: flex;
      gap: 16px;
      margin-top: 12px;
      justify-content: center;
    }
    .popup-actions button {
      min-width: 85px;
      border: none;
      outline: none;
      border-radius: 16px;
      padding: 7px 0;
      background: var(--yellow);
      color: #313131;
      font-size: 17px;
      font-weight: 500;
      cursor: pointer;
      box-shadow: 0 1px 4px #c7e9d2;
      transition: background .18s, color .18s;
    }
    .popup-actions button:hover {
      background: #fffbe4;
      color: #12a16e;
    }
    @media (max-width: 900px) {
      .content-box { width: 99vw; padding: 7px 2px;}
      .main { padding: 8px 0;}
      .content-header h1 { font-size: 22px;}
      th, td { font-size: 12px; padding: 6px 6px;}
      .bottom-action-bar { right: 6px; bottom: 8px;}
      .round-btn { font-size: 14px; padding: 7px 9px;}
      
    }
  </style>
</head>
<body>
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
    </div>
    <!-- MAIN -->
    <div class="main">
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
      <div class="content-box">
        <div class="table-wrap">
          <table id="productTable">
            <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Chất liệu</th>
                <th>Loại sản phẩm</th>
                <th>Kích cỡ</th>
                <th>Ngày tháng</th>
                <th>Ghi chú</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>SP0001</td>
                <td>Áo phông</td>
                <td>3</td>
                <td>130.000đ</td>
                <td>2/25/2025</td>
                <td>áo</td>
                <td>M</td>
                <td>Cotton</td>
                <td></td>
              </tr>
              <tr>
                <td>SP0002</td>
                <td>Quần đùi</td>
                <td>20</td>
                <td>70.000đ</td>
                <td>2/25/2025</td>
                <td>quần</td>
                <td>M</td>
                <td>Cotton</td>
                <td>Hàng loại 2</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Nút Sửa/Xóa cố định góc phải -->
      <div class="bottom-action-bar">
        <button class="round-btn edit-btn">
          <span class="icon">✏️</span>
          Sửa
        </button>
        <button class="round-btn delete-btn" id="deleteBtn">
          <span class="icon">🗑️</span>
          Xóa
        </button>
      </div>
    </div>
    <!-- POPUP DYNAMIC -->
    <div id="popup-root"></div>
  </div>
  <script>
    // Sidebar thu gọn/mở rộng
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
    // Chọn dòng
    const tbody = document.querySelector('#productTable tbody');
    let selectedRow = null;
    tbody.addEventListener('click', function(e) {
      let tr = e.target.closest('tr');
      if (!tr) return;
      tbody.querySelectorAll('tr').forEach(row => row.classList.remove('selected'));
      tr.classList.add('selected');
      selectedRow = tr;
    });
    // ==== POPUP FUNCTION ====
    function showPopup(type, onConfirm, onCancel) {
      // type: 'confirm' | 'success'
      const popupRoot = document.getElementById('popup-root');
      popupRoot.innerHTML = ''; // clear
      const overlay = document.createElement('div');
      overlay.className = 'popup-overlay';
      let popup = document.createElement('div');
      popup.className = 'popup';
      let closeBtn = document.createElement('button');
      closeBtn.className = 'close-btn';
      closeBtn.innerHTML = '&times;';
      closeBtn.onclick = () => {
        popupRoot.innerHTML = '';
        if (onCancel) onCancel();
      };
      popup.appendChild(closeBtn);
      if (type === 'confirm') {
        let title = document.createElement('div');
        title.className = 'popup-title';
        title.innerText = 'Bạn có chắc muốn xóa\nkhông?';
        popup.appendChild(title);
        let actions = document.createElement('div');
        actions.className = 'popup-actions';
        let okBtn = document.createElement('button');
        okBtn.innerText = 'Xác nhận';
        okBtn.onclick = () => {
          popupRoot.innerHTML = '';
          if (onConfirm) onConfirm();
        };
        let cancelBtn = document.createElement('button');
        cancelBtn.innerText = 'Huỷ';
        cancelBtn.onclick = () => {
          popupRoot.innerHTML = '';
          if (onCancel) onCancel();
        };
        actions.appendChild(okBtn);
        actions.appendChild(cancelBtn);
        popup.appendChild(actions);
      } else if (type === 'success') {
        let title = document.createElement('div');
        title.className = 'popup-title';
        title.innerText = 'Xoá thành công!';
        popup.appendChild(title);
      }
      overlay.appendChild(popup);
      popupRoot.appendChild(overlay);
    }
    // XOÁ SẢN PHẨM
    document.getElementById('deleteBtn').addEventListener('click', function() {
      if (!selectedRow) {
        showPopup('success');
        document.querySelector('.popup-title').innerText = 'Vui lòng chọn sản phẩm!';
        setTimeout(() => {
          document.getElementById('popup-root').innerHTML = '';
        }, 1300);
        return;
      }
      // Popup xác nhận
      showPopup('confirm', function() {
        selectedRow.parentNode.removeChild(selectedRow);
        selectedRow = null;
        showPopup('success');
        setTimeout(() => {
          document.getElementById('popup-root').innerHTML = '';
        }, 1500);
      });
    });
    // Sidebar active
    document.querySelectorAll('.sidebar-item').forEach(item => {
      item.addEventListener('click', function(e) {
        document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
        // Nếu là Trang chủ thì về /
        if(this.innerText.trim() === 'Trang chủ') {
          window.location.href = '/';
        }
      });
    });
  </script>
</body>
</html>
