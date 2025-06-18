<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thêm phiếu nhập - WEARLY</title>
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
      display: block;
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
    /* ==== MAIN CONTENT ==== */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      background: #fffbe6;
      padding: 36px 0;
      min-height: 100vh;
    }
    .form-box {
      background: #fff;
      border-radius: 20px;
      box-shadow: var(--main-shadow);
      padding: 36px 46px;
      min-width: 820px;
      width: 90%;
      margin: 0 auto;
    }
    .form-title {
      text-align: center;
      font-size: 36px;
      font-weight: 600;
      margin-bottom: 32px;
    }
    /* ==== INFO FORM ==== */
    .info-form {
      width: 100%;
      margin-bottom: 18px;
    }
    .info-row {
      width: 100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 18px;
    }
    .info-group {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .info-label {
      font-size: 18px;
      font-weight: 500;
      color: #232323;
      min-width: 120px;
    }
    .info-value, input[type="date"], select {
      background: var(--input);
      border-radius: 22px;
      border: none;
      font-size: 18px;
      padding: 7px 22px;
      color: #4d684f;
      margin-top: 2px;
      width: 270px;
      max-width: 100%;
      display: block;
      
    }
select, table select {
  text-align: center;
  text-align-last: center;

  padding-left: 0;
  padding-right: 0;
  text-indent: 0;
}

    select { width: 270px; }
    .info-group.right { margin-left: auto;}
    /* ==== TABLE ==== */
    .table-scroll { max-height: 220px; overflow-y: auto;}
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 18px;
      background: #fff;
    }
    table select option {
  text-align: center;
}

    th, td {
      border: 1px solid #cfd7ce;
      font-size: 17px;
      text-align: center;
      padding: 10px 0;
    }
    th {
      background: var(--green);
      font-size: 18px;
      font-weight: 600;
    }
    .action-cell button {
      background: var(--green);
      border: none;
      border-radius: 18px;
      padding: 5px 18px;
      font-size: 15px;
      margin: 0 4px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
      transition: background 0.2s, color 0.2s;
    }
    .action-cell button:hover { background: #faeceb; color: #c11a0a;}
    /* ==== TOTAL & ACTION ==== */
    .total-row {
      display: flex; align-items: center; gap: 25px; margin: 20px 0 0 0; justify-content: flex-end;
    }
    .total-label { font-size: 19px; color: #333; margin-right: 8px;}
    .total-value {
      background: var(--input);
      border-radius: 18px;
      min-width: 100px;
      display: inline-block;
      padding: 7px 22px;
      font-size: 18px;
      color: #227062;
      text-align: center;
    }
    input[type="text"], input[type="number"] {
  text-align: center;      /* Thêm dòng này cho input trong bảng */
}
.info-value,
input[type="date"],
select {
  background: var(--input);
  border-radius: 22px;
  border: none;
  font-size: 18px;
  padding: 7px 22px;
  color: #4d684f;
  margin-top: 2px;
  width: 270px;
  max-width: 100%;
  display: block;
  text-align: center;      /* Thêm dòng này */
}
    .form-action-row {
      display: flex;
      gap: 20px;
      justify-content: flex-end;
      margin-top: 28px;
    }
    .form-action-row button {
      background: var(--green);
      border: none;
      border-radius: 18px;
      padding: 10px 40px;
      font-size: 19px;
      font-weight: 600;
      color: #222;
      transition: background 0.2s, color 0.2s;
      cursor: pointer;
    }
    .form-action-row button:hover { background: #a8d5ba; color: #198754;}
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
.action-cell {
  text-align: center !important;
  vertical-align: middle !important;
  padding: 0 !important;
}
.btn-delete {
  background: #fff !important;
  color: #c11a0a;
  border: 1.5px solid #000 !important;  /* Viền đen đậm */
  font-weight: 600;
  box-shadow: 0 1px 3px #ededed;
  transition: background 0.2s, color 0.2s, border 0.2s;
  
}

.btn-delete:hover {
  background: #f4f4f4 !important; /* nền xám nhạt khi hover */
  color: #a31616 !important;
  border-color: #000;            /* viền đen đậm khi hover */
}

.action-cell button {
  display: inline-flex; /* dùng inline-flex để nút không chiếm full cell */
  align-items: center;
  justify-content: center;
  gap: 8px;  /* khoảng cách giữa chữ và icon */
  background: var(--green);
  border: none;
  border-radius: 18px;
  min-width: 74px;
  height: 38px;
  font-size: 17px;
  font-weight: 500;
  color: #222;
  cursor: pointer;
  box-shadow: 0 1px 3px #e0ede6;
  transition: background 0.2s, color 0.2s;  
  padding: 0 14px;
}

.action-cell button:hover {
  background: #faeceb;
  color: #c11a0a;
}

.delete-icon {
  width: 22px;
  height: 22px;
  object-fit: contain;
  margin-left: 0;
}
.total-row {
  flex-direction: column !important;
  align-items: flex-end !important;
  gap: 6px !important;
}
.total-row > div {
  display: flex;
  align-items: center;
  gap: 8px;
}
.confirm-popup {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(80,120,90,0.18);
  z-index: 1005;
  display: flex;
  align-items: center;
  justify-content: center;
}

.confirm-popup-box {
  background: var(--green);
  border-radius: 20px;
  box-shadow: 0 6px 30px #b7dfcc;
  padding: 34px 36px 24px 36px;
  min-width: 340px;
  min-height: 110px;
  position: relative;
  text-align: center;
  animation: popupfade 0.25s;
}

@keyframes popupfade {
  0% {transform: scale(0.8); opacity: 0;}
  100% {transform: scale(1); opacity: 1;}
}

.confirm-popup-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
}

.confirm-popup-actions {
  display: flex;
  gap: 18px;
  justify-content: center;
}

.confirm-btn {
  background: #fffbe6;
  color: #227062;
  font-weight: 600;
  border: none;
  border-radius: 16px;
  padding: 8px 24px;
  font-size: 17px;
  cursor: pointer;
  box-shadow: 0 1px 3px #e0ede6;
  transition: background 0.15s;
}
.confirm-btn:hover {
  background: #faf3dd;
  color: #24a273;
}

.cancel-btn {
  background: #fff;
  color: #222;
  font-weight: 600;
  border: none;
  border-radius: 16px;
  padding: 8px 24px;
  font-size: 17px;
  cursor: pointer;
  box-shadow: 0 1px 3px #e0ede6;
  transition: background 0.15s;
}
.cancel-btn:hover {
  background: #faf3dd;
}

.close-btn {
  position: absolute;
  top: 8px; right: 12px;
  background: none;
  border: none;
  font-size: 26px;
  color: #198754;
  cursor: pointer;
  font-weight: bold;
}
.confirm-popup {
  position: fixed;
  top: 0; left: 0; width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.18);
  display: flex; align-items: center; justify-content: center;
  z-index: 9999 !important;
  transition: opacity .2s;
}

.confirm-popup-box {
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
  text-align: center;
}

@keyframes popIn {
  from {transform: scale(.8); opacity: 0;}
  to {transform: scale(1); opacity: 1;}
}

.confirm-popup-box .close-btn {
  position: absolute; top: 16px; right: 16px;
  background: transparent; border: none;
  font-size: 25px; color: #fff; cursor: pointer;
  line-height: 1;
  transition: color .2s;
}
.confirm-popup-box .close-btn:hover { color: #222;}
.confirm-popup-content {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
}
.confirm-popup-content span, .confirm-popup-content .popup-title {
  color: #fff;
  font-size: 23px;
  font-weight: 500;
  text-align: center;
  margin-bottom: 16px;
  margin-top: 6px;
  line-height: 1.4;
}
.confirm-popup-actions {
  display: flex;
  gap: 60px;
  margin-top: 6px;
  justify-content: center;
}
.confirm-popup-actions button,
.confirm-btn, .cancel-btn {
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
  background: #fff; color: var(--dark);
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
  <!-- TOPBAR -->
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
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
      <a href="/" class="sidebar-item"><img src="{{ asset('img/home.png') }}"><span>Trang chủ</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span></a>
      <a href="#" class="sidebar-item active"><img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/home.png') }}"><span>Báo cáo thống kê</span></a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="main-content">
      <div class="form-box">
        <div class="form-title">Sửa phiếu nhập</div>
<!-- CHỈ SỬA LẠI DỮ LIỆU MẶC ĐỊNH NHƯ BÊN DƯỚI -->
<form method="post" action="{{ route('stockin.store') }}" onsubmit="return validateFormBeforeSubmit(event);">
  @csrf
  <!-- Info Form -->
  <div class="info-form">
    <div class="info-row">
      <div class="info-group">
        <div class="info-label">Mã phiếu nhập</div>
        <div class="info-value">MPN003</div>
      </div>
      <div class="info-group right">
        <div class="info-label">Mã nhân viên</div>
        <div class="info-value">NV003</div>
      </div>
    </div>
    <div class="info-row">
      <div class="info-group">
        <div class="info-label">Ngày nhập</div>
        <!-- Đúng ngày 2025-06-10 -->
        <input type="date" name="import_date" value="2025-06-10">
      </div>
      <div class="info-group right">
        <div class="info-label">Mã nhà cung cấp</div>
<select name="supplier_id" disabled style="background: #e0ede6;">
  <option value="MCC001" selected>MCC001</option>
</select>
      </div>
    </div>
  </div>
  <!-- Product Table -->
  <div class="table-scroll">
    <table>
      <colgroup>
        <col style="width:18%">
        <col style="width:28%">
        <col style="width:15%">
        <col style="width:18%">
        <col style="width:15%">
      </colgroup>
      <thead>
        <tr>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <!-- DÒNG 1 -->
        <tr>
          <td>
            <select name="products[0][id]">
              <option value="">▼</option>
              <option value="SP001" selected>SP0001</option>
              <option value="SP002">SP0002</option>
              <option value="SP003">SP0003</option>
              <option value="SP004">SP0004</option>
              <option value="SP005">SP0005</option>
            </select>
          </td>
          <td>
            <input type="text" name="products[0][name]" value="Áo phông" style="width: 120px;">
          </td>
          <td>
            <input type="text" name="products[0][qty]" value="90" style="width: 65px;">
          </td>
          <td>
            <input type="text" name="products[0][price]" value="49000" style="width: 95px;">
          </td>
          <td class="action-cell">
            <button type="button" class="btn-delete" onclick="confirmDelete(this)">
              Xoá <img src="{{ asset('img/delete.png') }}" alt="Xoá" class="delete-icon">
            </button>
          </td>
        </tr>
        <!-- DÒNG 2 -->
        <tr>
          <td>
            <select name="products[1][id]">
              <option value="">▼</option>
              <option value="SP001">SP0001</option>
              <option value="SP002">SP0002</option>
              <option value="SP003">SP0003</option>
              <option value="SP004" selected>SP0004</option>
              <option value="SP005">SP0005</option>
            </select>
          </td>
          <td>
            <input type="text" name="products[1][name]" value="Khăn" style="width: 120px;">
          </td>
          <td>
            <input type="text" name="products[1][qty]" value="50" style="width: 65px;">
          </td>
          <td>
            <input type="text" name="products[1][price]" value="29000" style="width: 95px;">
          </td>
          <td class="action-cell">
            <button type="button" class="btn-delete" onclick="confirmDelete(this)">
              Xoá <img src="{{ asset('img/delete.png') }}" alt="Xoá" class="delete-icon">
            </button>
          </td>
        </tr>
        <!-- DÒNG TRỐNG 3, 4, 5 (dành cho nhập thêm sp mới) -->
        @for($i = 2; $i < 5; $i++)
        <tr>
          <td>
            <select name="products[{{ $i }}][id]">
              <option value="" selected>▼</option>
              <option value="SP001">SP0001</option>
              <option value="SP002">SP0002</option>
              <option value="SP003">SP0003</option>
              <option value="SP004">SP0004</option>
              <option value="SP005">SP0005</option>
            </select>
          </td>
          <td><input type="text" name="products[{{ $i }}][name]" value="" style="width: 120px;"></td>
          <td><input type="text" name="products[{{ $i }}][qty]" value="" style="width: 65px;"></td>
          <td><input type="text" name="products[{{ $i }}][price]" value="" style="width: 95px;"></td>
          <td class="action-cell">
            <button type="button" class="btn-delete" onclick="confirmDelete(this)">
              Xoá <img src="{{ asset('img/delete.png') }}" alt="Xoá" class="delete-icon">
            </button>
          </td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>
  <!-- Total row -->
  <div class="total-row" style="flex-direction: column; align-items: flex-end; gap: 6px;">
    <div>
      <span class="total-label">Tổng sản phẩm</span>
      <span class="total-value" id="totalQty">2</span>
    </div>
    <div>
      <span class="total-label">Tổng giá trị</span>
      <span class="total-value" id="totalValue">5.860.000đ</span>
    </div>
  </div>
  <div class="form-action-row">
    <button type="button" onclick="window.history.back()">Quay lại</button>
    <button type="submit">Xác nhận</button>
  </div>
</form>

      </div>
    </div>
  </div>
</div>
<script>
    let editingRow = null;
let oldRowValues = null;
let editingInput = null; // input đang sửa (để focus lại khi hủy)

    // Hiện popup cảnh báo lỗi nhập liệu
function showInvalidPopup(msg) {
  document.getElementById('invalid-popup-msg').textContent = msg || "Thông tin không hợp lệ";
  document.getElementById('invalid-popup').style.display = 'flex';
}
function hideInvalidPopup() {
  document.getElementById('invalid-popup').style.display = 'none';
}

// Hàm kiểm tra số nguyên dương
function isValidNumber(val) {
  return /^\d+$/.test(val) && Number(val) > 0;
}

 // === Sidebar thu gọn/mở rộng
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

// ====== TÍNH TỔNG =======
function updateTotals() {
  let totalRow = 0; // Đếm số hàng hợp lệ
  let totalVal = 0;
  document.querySelectorAll('tbody tr').forEach(row => {
    let productId = row.querySelector('select[name*="[id]"]')?.value?.trim();
    let productName = row.querySelector('input[name*="[name]"]')?.value?.trim();

    // Chỉ tính những dòng có mã sản phẩm hoặc tên sản phẩm (không tính dòng trống)
    if (productId || productName) {
      totalRow++; // Mỗi hàng hợp lệ tăng 1
      let qty = parseInt(row.querySelector('input[name*="[qty]"]')?.value || 0);
      let price = parseInt(row.querySelector('input[name*="[price]"]')?.value || 0);
      if (!isNaN(qty) && !isNaN(price)) totalVal += qty * price;
    }
  });
  document.getElementById('totalQty').textContent = totalRow; // Chỉ hiển thị số hàng sản phẩm thực
  document.getElementById('totalValue').textContent = totalVal.toLocaleString('vi-VN') + 'đ';
}


function addTotalUpdateEvents() {
  document.querySelectorAll('input[name*="[qty]"], input[name*="[price]"], input[name*="[name]"]').forEach(input => {
    input.addEventListener('keydown', function(e) {
      if (e.key === "Enter") {
        e.preventDefault();
        editingRow = input.closest('tr');
        editingInput = input;
        // Lưu lại giá trị cũ của cả dòng để có thể reset nếu hủy
        oldRowValues = {
          name: editingRow.querySelector('input[name*="[name]"]').value,
          qty: editingRow.querySelector('input[name*="[qty]"]').value,
          price: editingRow.querySelector('input[name*="[price]"]').value,
        };
        showEditPopup();
      }
    });
    input.addEventListener('blur', updateTotals);
  });
}

function showEditPopup() {
  document.getElementById('edit-popup').style.display = 'flex';
}
function showEditSuccessPopup() {
  document.getElementById('edit-success-popup').style.display = 'flex';
}
function hideEditSuccessPopup() {
  document.getElementById('edit-success-popup').style.display = 'none';
  // Có thể updateTotals lại nếu muốn, hoặc focus lại input nào đó tuỳ ý bạn
}
function showDeleteSuccessPopup() {
  document.getElementById('delete-success-popup').style.display = 'flex';
}
function hideDeleteSuccessPopup() {
  document.getElementById('delete-success-popup').style.display = 'none';
}


function hideEditPopup(reset = false) {
  document.getElementById('edit-popup').style.display = 'none';
  if (reset && editingRow && oldRowValues) {
    // Trả lại giá trị cũ cho dòng
    editingRow.querySelector('input[name*="[name]"]').value = oldRowValues.name;
    editingRow.querySelector('input[name*="[qty]"]').value = oldRowValues.qty;
    editingRow.querySelector('input[name*="[price]"]').value = oldRowValues.price;
    if (editingInput) editingInput.focus();
  }
  editingRow = null;
  oldRowValues = null;
  editingInput = null;
}


// ====== POPUP XÁC NHẬN XOÁ ======
let rowToDelete = null;

function confirmDelete(btn) {
  rowToDelete = btn.closest('tr');
  document.getElementById('confirm-popup-msg').textContent = "Bạn muốn xoá sản phẩm này?";
  document.getElementById('confirm-popup').style.display = 'flex';
}

function hideConfirmPopup() {
  document.getElementById('confirm-popup').style.display = 'none';
  rowToDelete = null;
}

document.addEventListener("DOMContentLoaded", function() {
  // Sự kiện xác nhận xoá
  document.getElementById('confirm-ok-btn').onclick = function() {
    if (rowToDelete) {
      rowToDelete.remove();
      updateTotals();
      addTotalUpdateEvents(); // Cần gán lại vì DOM thay đổi
    }
    hideConfirmPopup();
    // Hiện popup "Xóa sản phẩm thành công"
    showDeleteSuccessPopup();
  };

  // Sự kiện xác nhận sửa
  document.getElementById('edit-ok-btn').onclick = function() {
    // Kiểm tra hợp lệ trước khi cho sửa thành công!
    if (editingRow) {
      let qtyVal = editingRow.querySelector('input[name*="[qty]"]').value;
      let priceVal = editingRow.querySelector('input[name*="[price]"]').value;
      if (!isValidNumber(qtyVal) || !isValidNumber(priceVal)) {
        hideEditPopup(false); // Ẩn popup sửa (nếu muốn có thể giữ lại)
        showInvalidPopup("Thông tin không hợp lệ");
        return;
      }
    }
    hideEditPopup(false);
    updateTotals();
    showEditSuccessPopup();
  };

  // Gán sự kiện cho các ô input khi load lần đầu
  addTotalUpdateEvents();
});


function validateFormBeforeSubmit(e) {
  let isValid = true;
  document.querySelectorAll('tbody tr').forEach(row => {
    let qtyInput = row.querySelector('input[name*="[qty]"]');
    let priceInput = row.querySelector('input[name*="[price]"]');
    let productId = row.querySelector('select[name*="[id]"]')?.value?.trim();
    let productName = row.querySelector('input[name*="[name]"]')?.value?.trim();

    if (productId || productName) {
      if (!isValidNumber(qtyInput.value) || !isValidNumber(priceInput.value)) {
        isValid = false;
      }
    }
  });

  if (!isValid) {
    showInvalidPopup("Thông tin không hợp lệ");
    e.preventDefault();
    return false;
  }
function showEditInvoiceConfirmPopup() {
  document.getElementById('confirm-edit-invoice-popup').style.display = 'flex';
}
function hideEditInvoiceConfirmPopup() {
  document.getElementById('confirm-edit-invoice-popup').style.display = 'none';
}

// Submit form khi xác nhận trong popup
document.addEventListener('DOMContentLoaded', function() {
  // Các hàm cũ...
  // Thêm event cho nút "Xác nhận" popup sửa phiếu nhập
  document.getElementById('edit-invoice-ok-btn').onclick = function() {
    // Tìm form cha và submit
    document.querySelector('form').submit();
  };
});

  // Nếu hợp lệ thì hiện popup xác nhận sửa phiếu nhập
  e.preventDefault();
  showEditInvoiceConfirmPopup();
  return false;
}



// ======= TỰ ĐỘNG NHẢY TÊN SẢN PHẨM ==========
const PRODUCT_NAMES = {
  SP001: "Áo phông",
  SP002: "Áo thun",
  SP003: "Quần short",
  SP004: "Khăn",
  SP005: "Mũ nón",
};

document.querySelectorAll('select[name^="products"][name$="[id]"]').forEach(function(sel) {
  sel.addEventListener('change', function() {
    const productId = this.value;
    const row = this.closest('tr');
    const nameInput = row.querySelector('input[name^="products"][name$="[name]"]');
    nameInput.value = PRODUCT_NAMES[productId] || "";
  });
});

function showSuccessPopup() {
  document.getElementById('success-popup').style.display = 'flex';
}
function hideSuccessPopup() {
  // Ẩn popup trước (nếu muốn)
  document.getElementById('success-popup').style.display = 'none';
  // Chuyển hướng sang index1.blade.php
window.location.href = "/stockin-index1";


}
function showEditInvoiceConfirmPopup() {
  document.getElementById('confirm-edit-invoice-popup').style.display = 'flex';
}
function hideEditInvoiceConfirmPopup() {
  document.getElementById('confirm-edit-invoice-popup').style.display = 'none';
}

function showEditSuccessPopup() {
  document.getElementById('edit-success-popup').style.display = 'flex';
}



document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('edit-invoice-ok-btn').onclick = function() {
    hideEditInvoiceConfirmPopup();
    showEditInvoiceSuccessPopup();
  };
});

function showEditInvoiceSuccessPopup() {
  document.getElementById('edit-invoice-success-popup').style.display = 'flex';
}

function hideEditInvoiceSuccessPopup() {
  document.getElementById('edit-invoice-success-popup').style.display = 'none';
  window.location.href = "/stockin-index2";
}


// Sửa lại validateFormBeforeSubmit
function validateFormBeforeSubmit(e) {
  let isValid = true;
  document.querySelectorAll('tbody tr').forEach(row => {
    let qtyInput = row.querySelector('input[name*="[qty]"]');
    let priceInput = row.querySelector('input[name*="[price]"]');
    let productId = row.querySelector('select[name*="[id]"]')?.value?.trim();
    let productName = row.querySelector('input[name*="[name]"]')?.value?.trim();

    if (productId || productName) {
      if (!isValidNumber(qtyInput.value) || !isValidNumber(priceInput.value)) {
        isValid = false;
      }
    }
  });

  if (!isValid) {
    showInvalidPopup("Thông tin không hợp lệ");
    e.preventDefault();
    return false;
  }
  e.preventDefault(); // chặn submit form
  showEditInvoiceConfirmPopup(); // hiện popup xác nhận
  return false;
}

</script>
<!-- Popup xác nhận -->
<div id="confirm-popup" class="confirm-popup" style="display:none;">
  <div class="confirm-popup-box">
    <button class="close-btn" onclick="hideConfirmPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span id="confirm-popup-msg">Bạn muốn xoá sản phẩm này?</span>
      <div class="confirm-popup-actions">
        <button id="confirm-ok-btn" class="confirm-btn">Xác nhận</button>
        <button onclick="hideConfirmPopup()" class="cancel-btn">Huỷ</button>
      </div>
    </div>
  </div>
</div>
<!-- Popup cảnh báo giá trị nhập không hợp lệ -->
<div id="invalid-popup" class="confirm-popup" style="display:none; z-index:2000;">
  <div class="confirm-popup-box" style="background:#93dfb5;">
    <button class="close-btn" onclick="hideInvalidPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span id="invalid-popup-msg" style="color:#fff; font-weight:600; font-size:20px;">Thông tin không hợp lệ</span>
      <!-- Đã xoá nút Đóng ở đây -->
    </div>
  </div>
</div>

<!-- Popup thông báo thành công -->
<div id="success-popup" class="confirm-popup" style="display:none; z-index:3000;">
  <div class="confirm-popup-box" style="background:#a8d5ba;">
    <button class="close-btn" onclick="hideSuccessPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span style="color:#fff; font-weight:600; font-size:22px;">Thêm phiếu nhập thành công!</span>
      <!-- Đã xoá nút Đóng ở đây -->
    </div>
  </div>
</div>

<!-- Popup xác nhận sửa -->
<div id="edit-popup" class="confirm-popup" style="display:none; z-index:5000;">
  <div class="confirm-popup-box">
    <button class="close-btn" onclick="hideEditPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span id="edit-popup-msg" style="color:#fff; font-weight:600; font-size:20px;">Bạn muốn sửa sản phẩm này?</span>
      <div class="confirm-popup-actions">
        <button id="edit-ok-btn" class="confirm-btn">Xác nhận</button>
        <button onclick="hideEditPopup(true)" class="cancel-btn">Huỷ</button>
      </div>
    </div>
  </div>
</div>
<!-- Popup sửa thành công -->
<div id="edit-success-popup" class="confirm-popup" style="display:none; z-index:6000;">
  <div class="confirm-popup-box" style="background:#a8d5ba;">
    <button class="close-btn" onclick="hideEditSuccessPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span style="color:#fff; font-weight:600; font-size:22px;">Sửa sản phẩm thành công!</span>
    </div>
  </div>
</div>
<!-- Popup xóa thành công -->
<div id="delete-success-popup" class="confirm-popup" style="display:none; z-index:6500;">
  <div class="confirm-popup-box" style="background:#a8d5ba;">
    <button class="close-btn" onclick="hideDeleteSuccessPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span style="color:#fff; font-weight:600; font-size:22px;">Xóa sản phẩm thành công!</span>
    </div>
  </div>
</div>
<!-- Popup xác nhận sửa phiếu nhập -->
<div id="confirm-edit-invoice-popup" class="confirm-popup" style="display:none; z-index:50000;">
  <div class="confirm-popup-box">
    <button class="close-btn" onclick="hideEditInvoiceConfirmPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span style="color:#fff; font-weight:600; font-size:20px;">Bạn muốn sửa phiếu nhập này?</span>
      <div class="confirm-popup-actions">
        <button id="edit-invoice-ok-btn" class="confirm-btn">Xác nhận</button>
        <button onclick="hideEditInvoiceConfirmPopup()" class="cancel-btn">Huỷ</button>
      </div>
    </div>
  </div>
</div>
<!-- Popup sửa thành công -->
<!-- Popup sửa phiếu nhập thành công -->
<div id="edit-invoice-success-popup" class="confirm-popup" style="display:none; z-index:6000;">
  <div class="confirm-popup-box" style="background:#a8d5ba;">
    <button class="close-btn" onclick="hideEditInvoiceSuccessPopup()">&times;</button>
    <div class="confirm-popup-content">
      <span style="color:#fff; font-weight:600; font-size:22px;">Sửa phiếu nhập thành công!</span>
    </div>
  </div>
</div>


</body>
</html>
