<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Phiếu xuất - WEARLY</title>
  <style>
    :root {
      --dark: #000;
      --green: #a8d5ba;
      --green-light: #b7dfcc;
      --green-dark: #24a273;
      --yellow: #faf3dd;
      --main-shadow: 0 2px 14px 2px #dbe8e0;
      --input: #e0ede6;
    }
    html, body { margin: 0; padding: 0; height: 100%; background: var(--yellow);}
    * { box-sizing: border-box; font-family: 'Be Vietnam Pro', Arial, sans-serif;}
    .container { min-height: 100vh; }

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
    .topbar .left-group { display: flex; align-items: center; gap: 22px; }
    .wearly-logo {
      height: 54px; margin-left: 24px; border-radius: 50%;
      background: #fff; object-fit: cover;
      border: 2px solid #fff; box-shadow: 0 1px 5px #dbe8e0;
    }
    .menu-toggle { width: 36px; height: 27px; flex-direction: column; cursor: pointer; display: flex; gap: 6px; margin-left: 6px;}
    .menu-toggle span { height: 5px; background: #222; border-radius: 2px; display: block; }
    .brand-name {
      position: absolute; left: 50%; transform: translateX(-50%);
      font-size: 32px; font-weight: bold; color: #313131; letter-spacing: 2px;
      padding: 7px 42px 6px 42px; border-radius: 16px;
    }
    .avatar { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 3px solid #fff; background: #fff; }

    /* ==== SIDEBAR ==== */
    .layout { display: flex; min-height: calc(100vh - 80px);}
    .sidebar {
      background: var(--green-light); width: 180px; min-width: 180px; height: 100vh;
      display: flex; flex-direction: column; gap: 6px; align-items: stretch;
      padding: 18px 0 0 0; box-shadow: var(--main-shadow);
      border-radius: 0 28px 28px 0; transition: width 0.25s; z-index: 99;
    }
    .sidebar.hide { width: 70px !important; min-width: 70px !important; }
    .sidebar.hide .sidebar-item span { display: none; }
    .sidebar.hide .sidebar-item { justify-content: center; padding: 13px 6px;}
    .sidebar-item {
      display: flex; align-items: center; gap: 14px;
      padding: 13px 18px; margin: 4px 8px; border-radius: 12px;
      color: #222; font-size: 17px; cursor: pointer;
      transition: background 0.2s, color 0.2s; text-decoration: none;
    }
    .sidebar-item.active {
      background: #fff !important; color: var(--green-dark) !important;
      font-weight: 700; box-shadow: 0 2px 12px #e0f5e6;
    }
    .sidebar-item.active span, .sidebar-item.active img {
      filter: none !important; color: var(--green-dark) !important;
    }
    .sidebar-item:hover { background: #e0f5e6; color: var(--green-dark); font-weight: 600;}
    .sidebar-item img { width: 30px; height: 30px;}
    .sidebar-item span {font-size: 17px; font-weight: 500;}

    /* ==== MAIN CONTENT ==== */
    .main-content {
      flex: 1; display: flex; flex-direction: column;
      align-items: center; justify-content: flex-start;
      background: #fffbe6; padding: 36px 0; min-height: 100vh;
    }
    .form-box {
      background: #fff; border-radius: 20px; box-shadow: var(--main-shadow);
      padding: 36px 46px; min-width: 820px; width: 90%; margin: 40px auto 0 auto;
    }
    .form-title {
      text-align: center; font-size: 36px; font-weight: 600;
      margin-bottom: 32px; color: #145c39;
    }
    .info-form { width: 100%; margin-bottom: 18px; }
    .info-row { width: 100%; display: flex; justify-content: space-between; margin-bottom: 18px; gap: 16px; flex-wrap: wrap;}
    .info-group { display: flex; align-items: center; gap: 12px; margin-bottom: 8px;}
    .info-label { font-size: 18px; font-weight: 500; color: #232323; min-width: 120px;}
    .info-value, input[type="date"], select {
      background: var(--input); border-radius: 22px; border: none; font-size: 18px;
      padding: 7px 22px; color: #4d684f; margin-top: 2px; width: 220px;
      max-width: 100%; display: block; text-align: center;
    }
    select, table select { text-align: center; text-align-last: center;}
    select, td select {
      width: 120px;
      padding: 6px 8px;
      text-align: center;
      text-align-last: center;
      margin: 0 auto;
      display: block;
      background: var(--input);
    }
    /* Đảm bảo option "Chọn" nằm giữa */
    td select option {
      text-align: center;
    }
    .table-scroll { max-height: 220px; overflow-y: auto;}
    table {
      width: 100%; border-collapse: collapse; margin-top: 18px; background: #fff;
    }
    th, td {
      border: 1.5px solid #b7dfcc; font-size: 17px;
      text-align: center; padding: 10px 0;
    }
    th { background: var(--green); font-size: 18px; font-weight: 600; }

    .action-cell button {
      background: #fff0f0; color: #b30000; border: none;
      border-radius: 9px; padding: 5px 16px;
      font-weight: 600; cursor: pointer; font-size: 15px; transition: background .17s; min-width: 58px;
    }
    .action-cell button:hover { background: #ffd5d5; color: #000; }
    /* ==== Tổng sản phẩm/tổng giá trị ==== */
    .total-row {
      display: flex; flex-direction: column; align-items: flex-end; gap: 10px; margin: 24px 0 0 0;
      font-weight: 600; color: #165e41;
    }
    .total-row > div { display: flex; align-items: center; gap: 12px;}
    .total-label { font-size: 19px; color: #333;}
    .total-value {
      background: var(--input); border-radius: 18px; min-width: 100px;
      display: inline-block; padding: 7px 22px; font-size: 18px; color: #227062; text-align: center;
    }
    .form-action-row {
      display: flex; gap: 20px; justify-content: flex-end; margin-top: 28px;
    }
    .form-action-row button, .form-action-row a {
      background: #a8d5ba; border: none; border-radius: 18px; padding: 10px 40px;
      font-size: 19px; font-weight: 600; color: #222; transition: background 0.2s, color 0.2s;
      cursor: pointer; text-decoration: none; display: inline-block;
    }
    .form-action-row button:hover, .form-action-row a:hover { background: #7fd9b8; color: #198754;}
    @media (max-width: 1100px) {
      .form-box { min-width: 0; width: 99%; padding: 22px 5vw;}
      .info-value { width: 98vw; }
      .info-row { gap: 12px 20px;}
    }
    @media (max-width: 700px) {
      .info-row { flex-direction: column; gap: 10px;}
      .form-box { padding: 5vw 2vw;}
      .info-group { width: 100%; }
    }
    /* Popup xác nhận xoá */
    .popup-confirm {
      position: fixed; top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(80,120,90,0.18); z-index: 2000;
      display: none; align-items: center; justify-content: center;
    }
    .popup-content {
      background: #a8d5ba; border-radius: 20px; box-shadow: 0 6px 30px #b7dfcc;
      padding: 34px 36px 24px 36px; min-width: 320px; min-height: 110px;
      text-align: center; animation: popupfade 0.25s;
    }
    .popup-title { font-size: 21px; font-weight: 600; color: #198754; margin-bottom: 18px;}
    .popup-actions { display: flex; gap: 22px; justify-content: center; margin-top: 12px;}
    .popup-btn {
      background: #fff; color: #24a273; border: none; border-radius: 16px; padding: 8px 24px;
      font-size: 17px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 3px #e0ede6; transition: background 0.15s;
    }
    .popup-btn:hover { background: #faf3dd; color: #145c39;}
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
      <!-- Giữ nguyên sidebar như các file khác -->
      <a href="/" class="sidebar-item"><img src="{{ asset('img/home.png') }}"><span>Trang chủ</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span></a>
      <a href="#" class="sidebar-item active"><img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span></a>
    </div>
    <div class="main-content">
      <div class="form-box">
        <div class="form-title" id="formTitle">Phiếu xuất</div>
        <form id="stockoutViewForm" autocomplete="off">
          <div class="info-form">
            <div class="info-row">
              <div class="info-group">
                <div class="info-label">Mã phiếu xuất</div>
                <div class="info-value" id="view_code"></div>
              </div>
              <div class="info-group">
                <div class="info-label">Ngày xuất</div>
                <input type="date" name="date" id="view_date" disabled>
              </div>
              <div class="info-group">
                <div class="info-label">Mã nhân viên</div>
                <input type="text" id="view_employee" disabled class="info-value">
              </div>
            </div>
          </div>
          <div class="table-scroll">
            <table>
              <thead>
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Nhà cung cấp</th>
                  <th>Số lượng xuất</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody id="prodTbody">
                <!-- Sẽ render bằng JS -->
              </tbody>
            </table>
          </div>
          <div class="total-row">
            <div>
              <span class="total-label">Tổng sản phẩm</span>
              <span class="total-value" id="tongSanPham">0</span>
            </div>
            <div>
              <span class="total-label">Tổng giá trị</span>
              <span class="total-value" id="tongTien">0đ</span>
            </div>
          </div>
          <div class="form-action-row">
            <a href="{{ route('stockout') }}">Quay lại</a>
            <button type="button" id="editBtn">Sửa</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('hide');
}
// LẤY MÃ PHIẾU XUẤT ĐƯỢC XEM
let code = sessionStorage.getItem('stockout_view');
let arr = JSON.parse(localStorage.getItem('stockout') || '[]');
let stockout = arr.find(item => item.code === code);

if (!stockout) {
  // Nếu không tìm thấy thì về lại danh sách
  window.location.href = "{{ route('stockout') }}";
}

document.getElementById('formTitle').textContent = 'Phiếu xuất ' + stockout.code;
document.getElementById('view_code').textContent = stockout.code;
document.getElementById('view_date').value = stockout.date;
document.getElementById('view_employee').value = stockout.employee;
document.getElementById('tongSanPham').textContent = stockout.totalProduct;
document.getElementById('tongTien').textContent = (stockout.totalPrice || 0).toLocaleString() + 'đ';

// Render danh sách sản phẩm (nếu có lưu)
let tbody = document.getElementById('prodTbody');
tbody.innerHTML = '';
if (stockout.products && Array.isArray(stockout.products)) {
  stockout.products.forEach(sp => {
    let tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${sp.code}</td>
      <td>${sp.name || ''}</td>
      <td>${sp.supplier || ''}</td>
      <td>${sp.qty || ''}</td>
      <td>${sp.price ? Number(sp.price).toLocaleString() + 'đ' : ''}</td>
      <td>${sp.price && sp.qty ? (sp.price * sp.qty).toLocaleString() + 'đ' : ''}</td>
    `;
    tbody.appendChild(tr);
  });
}

document.getElementById('editBtn').onclick = function() {
  // Lưu mã phiếu xuất sang session để trang sửa lấy lại
  sessionStorage.setItem('stockout_edit', stockout.code);
  window.location.href = "{{ route('stockout.edit') }}";
};
</script>
</body>
</html>
