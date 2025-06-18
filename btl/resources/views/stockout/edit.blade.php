{{-- resources/views/stockout/edit.blade.php --}}
@php
$products = [
    (object)[
        'code' => 'SP001', 'name' => 'Váy xòe', 'stock' => 120, 'price' => 140000,
        'supplier' => (object)['name'=>'MCC001']
    ],
    (object)[
        'code' => 'SP002', 'name' => 'Áo thun', 'stock' => 75, 'price' => 90000,
        'supplier' => (object)['name'=>'MCC002']
    ],
    (object)[
        'code' => 'SP003', 'name' => 'Quần short', 'stock' => 60, 'price' => 85000,
        'supplier' => (object)['name'=>'MCC003']
    ]
];
$employees = [
    (object)['code' => 'NV001'],
    (object)['code' => 'NV002'],
    (object)['code' => 'NV003'],
];
@endphp

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sửa phiếu xuất - WEARLY</title>
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
      <a href="#" class="sidebar-item"><img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span></a>
      <a href="#" class="sidebar-item active"><img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span></a>
      <a href="#" class="sidebar-item"><img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span></a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="main-content">
      <div class="form-box">
        <div class="form-title">Sửa phiếu xuất</div>
        <form id="stockoutEditForm" autocomplete="off">
          <div class="info-form">
            <div class="info-row">
              <div class="info-group">
                <div class="info-label">Mã phiếu xuất</div>
                <div class="info-value" id="edit_code"></div>
              </div>
              <div class="info-group">
                <div class="info-label">Ngày xuất</div>
                <input type="date" name="date" id="edit_date">
              </div>
              <div class="info-group">
                <div class="info-label">Mã nhân viên</div>
                <select name="employee_code" id="edit_employee">
                  @foreach($employees as $emp)
                    <option value="{{ $emp->code }}">{{ $emp->code }}</option>
                  @endforeach
                </select>
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
                  <th>Số lượng tồn</th>
                  <th>Số lượng xuất</th>
                  <th>Đơn giá</th>
                  <th>Chức năng</th>
                </tr>
              </thead>
              <tbody id="prodTbody">
                @for($i = 0; $i < 5; $i++)
                <tr>
                  <td>
                    <select name="products[{{ $i }}][product_code]" onchange="fillProductInfo(this)">
                      <option value="">-- Chọn --</option>
                      @foreach($products as $p)
                      <option value="{{ $p->code }}"
                              data-name="{{ $p->name }}"
                              data-supplier="{{ $p->supplier->name }}"
                              data-stock="{{ $p->stock }}"
                              data-price="{{ $p->price }}">
                        {{ $p->code }}
                      </option>
                      @endforeach
                    </select>
                  </td>
                  <td class="ten-sp"></td>
                  <td class="ncc-sp"></td>
                  <td class="ton-sp"></td>
                  <td>
                    <input type="number" min="1" class="so-luong" style="width:70px;" oninput="checkValidQty(this);calcTotal()">
                  </td>
                  <td class="gia-sp"></td>
                  <td class="action-cell">
                    <button type="button" onclick="showDeletePopup(this)">Xoá 🗑️</button>
                  </td>
                </tr>
                @endfor
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
            <button type="button" id="editConfirmBtn">Xác nhận</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Popup xác nhận xoá -->
<div id="popup-confirm" class="popup-confirm">
  <div class="popup-content">
    <div class="popup-title">Bạn muốn xoá sản phẩm này?</div>
    <div class="popup-actions">
      <button type="button" class="popup-btn" onclick="deleteRowConfirm()">Xoá</button>
      <button type="button" class="popup-btn" onclick="hideDeletePopup()">Huỷ</button>
    </div>
  </div>
</div>
<!-- Popup thông báo -->
<div id="popup-notify" class="popup-confirm" style="z-index:2100;">
  <div class="popup-content" style="min-width:320px;">
    <div class="popup-title" id="popup-notify-msg"></div>
    <div class="popup-actions" id="popup-notify-action" style="margin-top:20px;display:none;">
      <button type="button" class="popup-btn" onclick="hideNotifyPopup()">Đóng</button>
    </div>
  </div>
</div>
<script>
// Sidebar thu gọn/mở rộng
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

// Popup thông báo chung
function showNotifyPopup(msg, closeBtn = true, callback = null) {
  document.getElementById('popup-notify-msg').textContent = msg;
  const actionDiv = document.getElementById('popup-notify-action');
  if (closeBtn) {
    actionDiv.style.display = "flex";
    let closeButton = actionDiv.querySelector('button');
    if (callback) {
      closeButton.onclick = function() {
        hideNotifyPopup();
        callback();
      }
    } else {
      closeButton.onclick = hideNotifyPopup;
    }
  } else {
    actionDiv.style.display = "none";
    if (callback) {
      setTimeout(() => {
        hideNotifyPopup();
        callback();
      }, 1200);
    }
  }
  document.getElementById('popup-notify').style.display = "flex";
}

function hideNotifyPopup() {
  document.getElementById('popup-notify').style.display = "none";
}

// ===== Cấm chọn trùng mã sản phẩm
function fillProductInfo(select) {
  let option = select.selectedOptions[0];
  let code = option.value;
  if (!code) {
    resetProductRow(select);
    calcTotal();
    return;
  }
  // Kiểm tra trùng
  let selects = document.querySelectorAll('select[name^="products"]');
  let count = 0;
  selects.forEach(s => {
    if (s.value === code) count++;
  });
  if (count > 1) {
    select.selectedIndex = 0;
    resetProductRow(select);
    calcTotal();
    showNotifyPopup("Mã sản phẩm này đã được chọn ở dòng khác");
    return;
  }
  let row = select.closest('tr');
  row.querySelector('.ten-sp').textContent = option.dataset.name || '';
  row.querySelector('.ncc-sp').textContent = option.dataset.supplier || '';
  row.querySelector('.ton-sp').textContent = option.dataset.stock || '';
  row.querySelector('.gia-sp').textContent = option.dataset.price
    ? Number(option.dataset.price).toLocaleString() + 'đ' : '';
  // reset số lượng khi chọn lại mã sản phẩm
  let input = row.querySelector('.so-luong');
  input.value = "";
  calcTotal();
}
// Reset thông tin dòng khi chưa chọn sản phẩm
function resetProductRow(select) {
  let row = select.closest('tr');
  row.querySelector('.ten-sp').textContent = '';
  row.querySelector('.ncc-sp').textContent = '';
  row.querySelector('.ton-sp').textContent = '';
  row.querySelector('.gia-sp').textContent = '';
  let input = row.querySelector('.so-luong');
  input.value = "";
}

// ==== Xoá sản phẩm (popup xác nhận) ====
let rowToDelete = null;
function showDeletePopup(btn) {
    rowToDelete = btn.closest('tr');
    document.getElementById('popup-confirm').style.display = 'flex';
}
function hideDeletePopup() {
    document.getElementById('popup-confirm').style.display = 'none';
    rowToDelete = null;
}
function deleteRowConfirm() {
    if (rowToDelete) {
      // Reset row về trống (không remove row)
      rowToDelete.querySelectorAll('input,select').forEach(e => {
        if(e.tagName==='SELECT') e.selectedIndex=0; else e.value = '';
      });
      rowToDelete.querySelectorAll('td.ten-sp,td.ncc-sp,td.ton-sp,td.gia-sp').forEach(e => e.textContent = '');
      hideDeletePopup();
      calcTotal();
    }
}

// Kiểm tra hợp lệ khi nhập số lượng
document.querySelectorAll('.so-luong').forEach(input => {
  input.addEventListener('input', function(e) {
    checkValidQty(this);
    calcTotal();
  });
  input.addEventListener('keydown', function(e) {
    // Ngăn nhập ký tự không phải số, vẫn cho backspace, delete, tab, arrow
    if (
      e.key.length === 1 && (e.key < '0' || e.key > '9') ||
      ['e', 'E', '+', '-', '.', ','].includes(e.key)
    ) {
      e.preventDefault();
      showNotifyPopup("Thông tin không hợp lệ");
    }
  });
});

function checkValidQty(input) {
  let val = input.value;
  if (val && (!/^\d+$/.test(val) || parseInt(val) < 1)) {
    input.value = "";
    showNotifyPopup("Thông tin không hợp lệ");
    return;
  }
  let row = input.closest('tr');
  let ton = Number(row.querySelector('.ton-sp')?.textContent) || 0;
  let valNum = Number(input.value) || 0;
  if (valNum > ton && ton > 0) {
    input.value = ton;
    showNotifyPopup('Không được xuất quá số lượng tồn');
  }
}

function calcTotal() {
    let tbody = document.getElementById('prodTbody');
    let tongSL = 0, tongTien = 0;
    tbody.querySelectorAll('tr').forEach(row => {
        let sl = Number(row.querySelector('.so-luong')?.value) || 0;
        let gia = Number((row.querySelector('.gia-sp')?.textContent || '').replace(/[^\d]/g, '')) || 0;
        if(sl > 0 && gia > 0) {
            tongSL += sl;
            tongTien += (sl * gia);
        }
    });
    document.getElementById('tongSanPham').textContent = tongSL;
    document.getElementById('tongTien').textContent = tongTien.toLocaleString() + 'đ';
}

// LẤY MÃ PHIẾU XUẤT ĐANG SỬA
let code = sessionStorage.getItem('stockout_edit');
let arr = JSON.parse(localStorage.getItem('stockout') || '[]');
let stockout = arr.find(item => item.code === code);

// Nếu không có, quay lại
if (!stockout) window.location.href = "{{ route('stockout') }}";

// Hiển thị dữ liệu cơ bản
document.getElementById('edit_code').textContent = stockout.code;
document.getElementById('edit_date').value = stockout.date;
document.getElementById('edit_employee').value = stockout.employee;

// Hiển thị sản phẩm lên các dòng
let tbody = document.getElementById('prodTbody');
let trs = tbody.querySelectorAll('tr');
for(let i=0; i<5; i++) {
    let tr = trs[i];
    let prod = stockout.products && stockout.products[i] ? stockout.products[i] : null;
    let select = tr.querySelector('select');
    let name = tr.querySelector('.ten-sp');
    let ncc = tr.querySelector('.ncc-sp');
    let ton = tr.querySelector('.ton-sp');
    let qty = tr.querySelector('.so-luong');
    let gia = tr.querySelector('.gia-sp');
    if(prod) {
        // set value cho select option
        select.value = prod.code;
        let opt = select.querySelector(`option[value="${prod.code}"]`);
        if(opt) {
            name.textContent = opt.dataset.name || prod.name || '';
            ncc.textContent = opt.dataset.supplier || prod.supplier || '';
            ton.textContent = opt.dataset.stock || '';
            gia.textContent = opt.dataset.price ? Number(opt.dataset.price).toLocaleString() + 'đ' : (prod.price ? Number(prod.price).toLocaleString()+'đ' : '');
        } else {
            name.textContent = prod.name || '';
            ncc.textContent = prod.supplier || '';
            gia.textContent = prod.price ? Number(prod.price).toLocaleString()+'đ':'';
        }
        qty.value = prod.qty;
    } else {
        select.value = '';
        name.textContent = '';
        ncc.textContent = '';
        ton.textContent = '';
        qty.value = '';
        gia.textContent = '';
    }
}
// Cập nhật tổng lại
calcTotal();

// Xử lý bấm "Xác nhận"
document.getElementById('editConfirmBtn').onclick = function(e) {
  e.preventDefault();
  // Validate
  let valid = false;
  document.querySelectorAll('.so-luong').forEach(input => {
    if (input.value && Number(input.value) > 0) valid = true;
  });
  if (!valid) {
    showNotifyPopup("Bạn phải chọn ít nhất 1 sản phẩm và số lượng xuất hợp lệ");
    return;
  }
  // LẤY THÔNG TIN PHIẾU XUẤT
  let date = document.getElementById('edit_date').value;
  let employee = document.getElementById('edit_employee').value;
  let products = [];
  let totalProduct = 0, totalPrice = 0;
  document.querySelectorAll('#prodTbody tr').forEach(row => {
    let code = row.querySelector('select').value;
    let name = row.querySelector('.ten-sp').textContent;
    let supplier = row.querySelector('.ncc-sp').textContent;
    let qty = Number(row.querySelector('.so-luong').value) || 0;
    let price = Number((row.querySelector('.gia-sp').textContent || '').replace(/[^\d]/g, '')) || 0;
    if (code && qty > 0 && price > 0) {
      products.push({code, name, supplier, qty, price});
      totalProduct += qty;
      totalPrice += qty * price;
    }
  });
  // Update object
  stockout.date = date;
  stockout.employee = employee;
  stockout.products = products;
  stockout.totalProduct = totalProduct;
  stockout.totalPrice = totalPrice;
  stockout.supplier = products[0]?.supplier || '';
  // Update localStorage
  let idx = arr.findIndex(item => item.code === stockout.code);
  if(idx !== -1) arr[idx] = stockout;
  localStorage.setItem('stockout', JSON.stringify(arr));
  showNotifyPopup("Cập nhật phiếu xuất thành công", true, function() {
  window.location.href = "{{ route('stockout') }}";
});

};
</script>
</body>
</html>
