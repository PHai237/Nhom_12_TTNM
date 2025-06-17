<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý xuất kho - WEARLY</title>
  <style>
    :root {
      --green: #b7dfcc;
      --yellow: #faf3dd;
      --table-head: #a8d5ba;
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
      font-family: 'Be Vietnam Pro', Arial, sans-serif;
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
      font-size: 42px;
      font-weight: bold;
      color: #222;
      margin: 0;
      letter-spacing: 1px;
    }

    .action-bar {
      display: flex;
      align-items: center;
      gap: 18px;
    }

    .search-box {
      background: #b7dfcc;
      border-radius: 22px;
      display: flex;
      align-items: center;
      padding: 0 18px;
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
      font-size: 22px;
      cursor: pointer;
      color: #2e8656;
      margin-left: 6px;
      transition: color 0.2s;
      display: flex;
      align-items: center;
    }

    .search-btn:hover {
      color: #005640;
    }

    .add-btn {
      background: #b7dfcc;
      color: #222;
      border: none;
      border-radius: 22px;
      padding: 7px 30px;
      font-size: 18px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 1px 4px #e7f2ec7a;
      cursor: pointer;
      transition: background 0.18s, color 0.18s;
    }

    .add-btn .icon {
      font-size: 21px;
    }

    .add-btn:hover {
      background: #a8d5ba;
      color: #198754;
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
td {
  white-space: nowrap; 
}
    th {
      background: var(--table-head);
      font-weight: bold;
      font-size: 18px;
      border-bottom: 3px solid #b7dfcc;
    }

    /* Nút Xem/Xóa chuẩn Figma */
    .action-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #b7dfcc;
      color: #222;
      border: none;
      border-radius: 22px;
      padding: 7px 22px;
      font-size: 17px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.18s, color 0.18s;
      box-shadow: 0 1px 4px #e7f2ec7a;
      outline: none;
    }

    .action-btn .icon {
      font-size: 19px;
      margin-left: 6px;
      display: flex;
      align-items: center;
    }

    .action-btn:hover {
      background: #a8d5ba;
      color: #198754;
    }

    .action-btn.delete-btn:hover {
      color: #c11a0a;
      background: #f9dbdb;
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

      th,
      td {
        font-size: 13px;
        padding: 9px 6px;
      }
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
    </div>
      <!-- MAIN -->
      <div class="main">
        <div class="content-box">
          <div class="content-header">
            <h1>Quản lý nhập kho</h1>
            <div class="action-bar">
              <div class="search-box">
                <input type="text" placeholder="Tìm kiếm" id="searchInput">
                <button class="search-btn" title="Tìm kiếm">
                  <span class="icon">🔍</span>
                </button>
              </div>
              <button class="add-btn">
                Thêm
                <span class="icon">➕</span>
              </button>
            </div>
          </div>
          <div class="table-wrap">
            <table id="stockoutTable">
              <thead>
                <tr>
                  <th>Mã phiếu xuất</th>
                  <th>Ngày xuất</th>
                  <th>Mã nhân viên</th>
                  <th>Tổng sản phẩm</th>
                  <th>Tổng tiền</th>
                  <th>Chức năng</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>MPX001</td>
                  <td>05/06/2025</td>
                  <td>NV003</td>
                  <td>3</td>
                  <td>4.370.000đ</td>
                  <td>
                    <button class="action-btn"><span>Xem</span> <span class="icon">👁️</span></button>
                    <button class="action-btn delete-btn"><span>Xoá</span> <span class="icon">🗑️</span></button>
                  </td>
                </tr>
                <tr>
                  <td>MPX002</td>
                  <td>08/06/2025</td>
                  <td>NV003</td>
                  <td>1</td>
                  <td>799.000đ</td>
                  <td>
                    <button class="action-btn"><span>Xem</span> <span class="icon">👁️</span></button>
                    <button class="action-btn delete-btn"><span>Xoá</span> <span class="icon">🗑️</span></button>
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