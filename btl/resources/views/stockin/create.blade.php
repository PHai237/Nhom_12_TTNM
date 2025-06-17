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
        <div class="form-title">Thêm phiếu nhập</div>
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
                <input type="date" name="import_date" value="{{ date('Y-m-d') }}">
              </div>
              <div class="info-group right">
                <div class="info-label">Mã nhà cung cấp</div>
                <select name="supplier_id">
                  <option value="">-- Chọn --</option>
                  <option value="MCC001">MCC001</option>
                  <option value="MCC002">MCC002</option>
                  <option value="MCC003">MCC003</option>
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
                @for($i = 0; $i < 5; $i++)
                <tr>
                  <td>
                    <select name="products[{{ $i }}][id]">
                      <option value="">▼</option>
                      <option value="SP001">SP001</option>
                      <option value="SP002">SP002</option>
                      <option value="SP003">SP003</option>
                      <option value="SP004">SP004</option>
                      <option value="SP005">SP005</option>
                    </select>
                  </td>
                  <td>
                    <input type="text" name="products[{{ $i }}][name]" value="" style="width: 120px;">
                  </td>
                  <td>
                    <input type="number" name="products[{{ $i }}][qty]" min="1" value="1" style="width: 65px;">
                  </td>
                  <td>
                    <input type="number" name="products[{{ $i }}][price]" min="0" value="" style="width: 95px;">
                  </td>
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
    <span class="total-value" id="totalQty">0</span>
  </div>
  <div>
    <span class="total-label">Tổng giá trị</span>
    <span class="total-value" id="totalValue">0đ</span>
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
  let totalQty = 0, totalVal = 0;
  document.querySelectorAll('tbody tr').forEach(row => {
    // Chỉ cộng dòng có mã sản phẩm hoặc tên sản phẩm
    let productId = row.querySelector('select[name*="[id]"]')?.value?.trim();
    let productName = row.querySelector('input[name*="[name]"]')?.value?.trim();
    if (!productId && !productName) return; // Bỏ qua hàng trống

    let qty = parseInt(row.querySelector('input[name*="[qty]"]')?.value || 0);
    let price = parseInt(row.querySelector('input[name*="[price]"]')?.value || 0);
    if (!isNaN(qty)) totalQty += qty;
    if (!isNaN(qty) && !isNaN(price)) totalVal += qty * price;
  });
  document.getElementById('totalQty').textContent = totalQty;
  document.getElementById('totalValue').textContent = totalVal.toLocaleString('vi-VN') + 'đ';
}


function addTotalUpdateEvents() {
  document.querySelectorAll('input[name*="[qty]"], input[name*="[price]"]').forEach(input => {
    input.addEventListener('keydown', function(e) {
      if (e.key === "Enter") {
        updateTotals();
        // Nếu muốn rời focus luôn sau khi Enter:
        this.blur();
      }
    });
    input.addEventListener('blur', updateTotals);
  });
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

    // Nếu hàng có nhập sản phẩm (mã hoặc tên)
    if (productId || productName) {
      // Kiểm tra số lượng và đơn giá
      if (!isValidNumber(qtyInput.value) || !isValidNumber(priceInput.value)) {
        isValid = false;
      }
    }
  });

  if (!isValid) {
    showInvalidPopup("Thông tin không hợp lệ");
    // Chặn submit form
    e.preventDefault();
    return false;
  }
  // Cho phép submit nếu hợp lệ
  return true;
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
      <div class="confirm-popup-actions">
        <button onclick="hideInvalidPopup()" class="confirm-btn">Đóng</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
