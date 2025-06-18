<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý nhà cung cấp - WEARLY</title>
    <style>
        :root {
            --green: #a8d5ba;
            --green-light: #b7dfcc;
            --green-dark: #24a273;
            --yellow: #faf3dd;
            --main-shadow: 0 2px 14px 2px #dbe8e0;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            background: var(--yellow);
        }

        * {
            box-sizing: border-box;
            font-family: 'Be Vietnam Pro', Arial, sans-serif;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

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
            background: #fff;
        }

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

        .sidebar.hide {
            width: 70px !important;
            min-width: 70px !important;
        }

        .sidebar.hide .sidebar-item span {
            display: none;
        }

        .sidebar.hide .sidebar-item {
            justify-content: center;
            padding: 13px 6px;
        }

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

        .sidebar-item.active span,
        .sidebar-item.active img {
            filter: none !important;
            color: var(--green-dark) !important;
        }

        .sidebar-item:hover {
            background: #e0f5e6;
            color: var(--green-dark);
            font-weight: 600;
        }

        .sidebar-item img {
            width: 30px;
            height: 30px;
        }

        .sidebar-item span {
            font-size: 17px;
            font-weight: 500;
        }

        .main {
            flex: 1;
            background: var(--yellow);
            padding: 46px 0 0 0;
        }

        .content-header {
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
            font-size: 20px;
            cursor: pointer;
            color: #2e8656;
            margin-left: 6px;
            transition: color 0.2s;
        }

        .search-btn:hover {
            color: #005640;
        }

        .add-btn {
            background: #9be6c8;
            color: #222;
            border: none;
            border-radius: 22px;
            padding: 7px 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }

        .add-btn .icon {
            font-size: 20px;
        }

        .add-btn:hover {
            background: #7fd9b8;
        }

        .table-wrap {
            overflow-x: auto;
            margin-top: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 0;
            overflow: hidden;
            font-size: 16px;
            font-weight: 500;
            color: #222;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px 8px;
            text-align: center;
        }

        th {
            font-weight: 600;
            background: #ffffff;
        }

        tbody tr.selected {
            background-color: #b7dfcc !important;
            font-weight: 600;
        }

        tbody tr:hover {
            background-color: #d1e8d3;
            cursor: pointer;
        }

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

        .edit-btn:hover {
            background: #c0f7d2;
            color: #228e5f;
        }

        .delete-btn:hover {
            background: #ffe0e0;
            color: #b30000;
        }

        /* ==== POPUP FORM THÊM nhà cung cấp 2 CỘT ==== */
        .overlay-form {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.10);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-form-popup {
            background: #fffaf8;
            border-radius: 18px;
            box-shadow: 0 8px 40px #b7dfcc93;
            padding: 38px 42px 24px 42px;
            min-width: 660px;
            min-height: 320px;
            max-width: 96vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .add-form-title {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 18px;
            color: #1b1b1b;
            letter-spacing: 1px;
            text-align: center;
        }

        .add-form-content-2col {
            display: flex;
            width: 100%;
            gap: 48px;
            margin-bottom: 20px;
            justify-content: center;
        }

        .add-form-content-2col .col {
            display: flex;
            flex-direction: column;
            gap: 17px;
            flex: 1 1 0;
        }

        .add-form-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .add-form-row label {
            width: 120px;
            font-size: 1.1rem;
            color: #222;
            font-weight: 500;
            text-align: left;
            flex-shrink: 0;
        }

        .add-form-field {
            flex: 1 1 0;
            min-width: 0;
            border: none;
            background: #6fc6a1;
            padding: 10px 18px;
            border-radius: 22px;
            font-size: 1.12rem;
            color: #fff;
            outline: none;
            transition: background 0.14s;
        }

        .add-form-field:focus {
            background: #24a273;
            color: #fff;
        }

        .add-form-field[readonly] {
            background: #d4ecdd;
            color: #222;
        }

        .add-form-btns {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 18px;
        }

        .add-form-btn {
            background: #b7dfcc;
            color: #1b1b1b;
            border: none;
            border-radius: 16px;
            padding: 12px 44px;
            font-size: 1.13rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.16s, color 0.16s;
            box-shadow: 0 2px 8px #d3ebdf96;
        }

        .add-form-btn.confirm {
            background: #99d8bb;
            color: #055b32;
        }

        .add-form-btn:hover {
            background: #8cd5b0;
            color: #0a3e28;
        }

        @media (max-width: 820px) {
            .add-form-popup {
                min-width: 98vw;
                padding: 7vw 2vw;
            }

            .add-form-content-2col {
                flex-direction: column;
                gap: 14px;
            }

            .add-form-btns {
                gap: 20px;
            }
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
  <a href="{{ route('home') }}" class="sidebar-item {{ request()->routeIs('home') || request()->routeIs('welcome') ? 'active' : '' }}">
    <img src="{{ asset('img/home.png') }}"><span>Trang chủ</span>
  </a>
  <a href="{{ route('products') }}" class="sidebar-item {{ request()->routeIs('products') ? 'active' : '' }}">
    <img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span>
  </a>
  <a href="{{ route('producer') }}" class="sidebar-item {{ request()->routeIs('producer') ? 'active' : '' }}">
    <img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span>
  </a>
  <a href="{{ route('stockin') }}" class="sidebar-item {{ request()->routeIs('stockin') ? 'active' : '' }}">
    <img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span>
  </a>
  <a href="{{ route('stockout') }}" class="sidebar-item {{ request()->routeIs('stockout') ? 'active' : '' }}">
    <img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span>
  </a>
  <a href="{{ route('inventory') }}" class="sidebar-item {{ request()->routeIs('inventory') ? 'active' : '' }}">
    <img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span>
  </a>
</div>

        <!-- MAIN -->
        <div class="main">
            <div class="content-header">
                <h1>Quản Lý nhà cung cấp</h1>
                <div class="action-bar">
                    <div class="search-box">
                        <input type="text" placeholder="Tìm kiếm" id="searchInput">
                        <button class="search-btn" title="Tìm kiếm">&#128269;</button>
                    </div>
                    <button class="add-btn" id="addBtn"><span class="icon"><img src="{{ asset('img/add.png') }}"></span>Thêm</button>
                </div>
            </div>
            <div class="content-box">
                <div class="table-wrap">
                    <table id="productTable">
                        <thead>
                            <tr>
                                <th>Mã nhà cung cấp</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Mã số thuế</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoai</th>
                                <th>Email</th>
                                <th>Mô tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>MCC001</td>
                                <td>Nhà cung cấp A</td>
                                <td>123456789</td>
                                <td>123 Đường ABC, Quận 1</td>
                                <td>0901234567</td>
                                <td>Cung cấp váy </td>
                            </tr>
                            <tr>
                                <td>MCC002</td>
                                <td>Nhà cung cấp b</td>
                                <td>1234567449</td>
                                <td>123 Đường ABC, Quận 1</td>
                                <td>0901234777</td>
                                <td>Cung cấp quần </td>
                            </tr>
                            <tr>
                                <td>MCC003</td>
                                <td>Nhà cung cấp b</td>
                                <td>1234567449</td>
                                <td>123 Đường ABC, Quận 1</td>
                                <td>0901234777</td>
                                <td>Cung cấp quần </td>
                            </tr>
                              <tr>
                                <td>MCC004</td>
                                <td>Nhà cung cấp b</td>
                                <td>1234567449</td>
                                <td>123 Đường ABC, Quận 1</td>
                                <td>0901234777</td>
                                <td>Cung cấp quần </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Nút Sửa/Xóa -->
            <div class="bottom-action-bar">
                <button class="round-btn edit-btn">
                    <span class="icon"><img src="{{ asset('img/edit.png') }}"></span> Sửa
                </button>
                <button class="round-btn delete-btn" id="deleteBtn">
                    <span class="icon"><img src="{{ asset('img/delete.png') }}"></span> Xóa
                </button>
            </div>
        </div>
        <!-- FORM THÊM SẢN PHẨM (ẩn) -->
        <div id="addFormRoot"></div>
    </div>
    <script>
        // Kiểm tra hợp lệ từng trường (có thể dùng cho cả thêm và sửa)
        function validateProductForm(form) {
            let isValid = true;
            // Xóa thông báo cũ
            form.querySelectorAll('.error-msg').forEach(e => e.remove());

            function showError(input, msg) {
                let err = document.createElement('div');
                err.className = 'error-msg';
                err.style.color = '#e84f3e';
                err.style.fontSize = '0.99em';
                err.style.margin = '3px 0 0 4px';
                err.textContent = msg;
                input.parentNode.appendChild(err);
                isValid = false;
            }

            // Quy định: chỉ chữ cái và khoảng trắng
            const reText = /^[\p{L} ]+$/u;
            // Quy định: số dương
            const reNum = /^\d+$/;

            const name = form.elements['name'];
            if (!name.value.trim() || !reText.test(name.value)) {
                showError(name, 'Tên sản phẩm không chứa ký tự số và ký tự đặc biệt!');
            }

            const qty = form.elements['qty'];
            if (!reNum.test(qty.value) || parseInt(qty.value) <= 0) {
                showError(qty, 'Số lượng phải là số và lớn hơn 0');
            }

            const price = form.elements['price'];
            if (!reNum.test(price.value) || parseInt(price.value) <= 0) {
                showError(price, 'Đơn giá phải là số và lớn hơn 0');
            }

            const size = form.elements['size'];
            if (!size.value.trim()) {
                showError(size, 'Vui lòng nhập kích cỡ');
            }

            const material = form.elements['material'];
            if (!material.value.trim() || !reText.test(material.value)) {
                showError(material, 'Chất liệu không chứa ký tự số và ký tự đặc biệt!');
            }

            const type = form.elements['type'];
            if (!type.value.trim() || !reText.test(type.value)) {
                showError(type, 'Loại sản phẩm không chứa ký tự số và ký tự đặc biệt!');
            }

            return isValid;
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

        // Sidebar thu gọn/mở rộng
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('hide');
        }

        // Hiện popup
        function showPopup(type, message, onConfirm, onCancel) {
            const popupRoot = document.getElementById('popup-root') || (() => {
                const d = document.createElement('div');
                d.id = 'popup-root';
                document.body.appendChild(d);
                return d;
            })();
            popupRoot.innerHTML = '';
            const overlay = document.createElement('div');
            overlay.style = `
      position:fixed;left:0;top:0;width:100vw;height:100vh;
      background:rgba(0,0,0,0.01);z-index:99999;
      display:flex;align-items:center;justify-content:center;`;

            let box = document.createElement('div');
            box.style = `
      min-width:310px;max-width:97vw;background:#6fc6a1;border-radius:20px;
      box-shadow:0 5px 18px #b6dfc499;position:relative;padding:36px 28px 32px 28px;
      display:flex;flex-direction:column;align-items:center;gap:18px;animation:popIn .2s;`;
            box.innerHTML = `
      <button class="popup-close-btn" style="position:absolute;top:11px;right:18px;background:none;border:none;font-size:1.3em;cursor:pointer;color:#fff;" title="Đóng">&times;</button>
      <div style="color:#fff;font-size:1.27em;text-align:center;margin-bottom:6px;">${message}</div>
    `;
            box.querySelector('.popup-close-btn').onclick = () => popupRoot.innerHTML = '';
            if (type === 'confirm') {
                let btnGroup = document.createElement('div');
                btnGroup.style = 'display:flex;gap:16px;justify-content:center;';
                btnGroup.innerHTML = `
        <button style="background:#faf3dd;color:#055b32;border:none;border-radius:11px;padding:7px 22px;font-size:1em;font-weight:600;cursor:pointer;">Xác nhận</button>
        <button style="background:#faf3dd;color:#b30000;border:none;border-radius:11px;padding:7px 22px;font-size:1em;font-weight:600;cursor:pointer;">Huỷ</button>
      `;
                btnGroup.children[0].onclick = function() {
                    popupRoot.innerHTML = '';
                    if (onConfirm) onConfirm();
                };
                btnGroup.children[1].onclick = function() {
                    popupRoot.innerHTML = '';
                    if (onCancel) onCancel();
                };
                box.appendChild(btnGroup);
            }
            overlay.appendChild(box);
            popupRoot.appendChild(overlay);
        }

        // Nút SỬA
        document.querySelector('.edit-btn').onclick = function() {
            if (!selectedRow) {
                showPopup('alert', 'Vui lòng chọn nhà cung cấp để sửa!');
                return;
            }
            // Lấy dữ liệu dòng được chọn
            const tds = selectedRow.querySelectorAll('td');
            const values = [...tds].map(td => td.textContent);

            showEditForm(values);
        };

        function showEditForm(values) {
            const addFormRoot = document.getElementById('addFormRoot');
            addFormRoot.innerHTML = `
      <div class="overlay-form" id="overlayForm">
        <form class="add-form-popup" id="editForm" autocomplete="off">
          <div class="add-form-title">Sửa sản phẩm</div>
          <div class="add-form-content-2col">
            <div class="col">
              <div class="add-form-row">
                <label>Mã nhà cung cấp</label>
                <input class="add-form-field" name="code" value="${values[0] || ''}" readonly />
              </div>
              <div class="add-form-row">
                <label>Tên nhà cung cấp</label>
                <input class="add-form-field" name="name" value="${values[1] || ''}" required />
              </div>
          
              <div class="add-form-row">
                <label>Mã số thuế</label>
                <input class="add-form-field" name="price" type="text" value="${values[3] || ''}" required />
              </div>
            
            </div>
            <div class="col">
              <div class="add-form-row">
                <label>Địa chỉ</label>
                <input class="add-form-field" name="size" value="${values[6] || ''}" required />
              </div>
              <div class="add-form-row">
                <label>Số điện thoại</label>
                <input class="add-form-field" name="material" value="${values[4] || ''}" required />
              </div>
              <div class="add-form-row">
                <label>Email</label>
                <input class="add-form-field" name="type" value="${values[5] || ''}" required />
              </div>
              <div class="add-form-row">
                <label>Mô tả</label>
                <input class="add-form-field" name="note" value="${values[8] || ''}" />
              </div>
            </div>
          </div>
          <div class="add-form-btns">
            <button type="button" class="add-form-btn" id="cancelEditBtn">Quay lại</button>
            <button type="submit" class="add-form-btn confirm">Xác nhận</button>
          </div>
        </form>
      </div>
    `;
            // Xử lý quay lại (đóng form)
            document.getElementById('cancelEditBtn').onclick = function() {
                addFormRoot.innerHTML = '';
            };
            // Đóng khi click ra ngoài
            document.getElementById('overlayForm').onclick = function(e) {
                if (e.target === this) addFormRoot.innerHTML = '';
            };
            // Xác nhận sửa nhà cung cấp
            document.getElementById('editForm').onsubmit = function(e) {
                e.preventDefault();
                if (!validateProductForm(this)) return;
                showPopup('confirm', 'Bạn có chắc muốn sửa không?', () => {
                    let fd = new FormData(document.getElementById('editForm'));
                    let arr = [
                        fd.get('code'),
                        fd.get('name'),
                        fd.get('qty'),
                        fd.get('price'),
                        fd.get('material'),
                        fd.get('type'),
                        fd.get('size'),
                        fd.get('date'),
                        fd.get('note')
                    ];
                    // Ghi lại dữ liệu vào dòng đã chọn
                    const tds = selectedRow.querySelectorAll('td');
                    tds[0].textContent = arr[0];
                    tds[1].textContent = arr[1];
                    tds[2].textContent = arr[2];
                    tds[3].textContent = arr[3];
                    tds[4].textContent = arr[4];
                    tds[5].textContent = arr[5];
                    tds[6].textContent = arr[6];
                    tds[7].textContent = arr[7];
                    tds[8].textContent = arr[8];
                    addFormRoot.innerHTML = '';
                    showPopup('success', 'Sửa thành công!');
                    setTimeout(() => document.getElementById('popup-root').innerHTML = '', 1200);
                });
            };
        }

        // Nút XÓA
        document.getElementById('deleteBtn').onclick = function() {
            if (!selectedRow) {
                showPopup('alert', 'Vui lòng chọn nhà cung cấp để xoá!');
                return;
            }
            showPopup('confirm', 'Bạn có chắc muốn xoá không?', function() {
                selectedRow.parentNode.removeChild(selectedRow);
                selectedRow = null;
                showPopup('success', 'Xoá thành công!');
                setTimeout(() => document.getElementById('popup-root').innerHTML = '', 1200);
            });
        };

        // FORM POPUP THÊM nhà cung cấp (2 CỘT)
        document.getElementById('addBtn').onclick = function() {
            showAddForm();
        };

        function showAddForm() {
            const addFormRoot = document.getElementById('addFormRoot');
            addFormRoot.innerHTML = `
      <div class="overlay-form" id="overlayForm">
        <form class="add-form-popup" id="addForm" autocomplete="off">
          <div class="add-form-title">Thêm nhà cung cấp</div>
          <div class="add-form-content-2col">
            <div class="col">
              <div class="add-form-row">
                <label>Mã nhà cung cấp</label>
                <input class="add-form-field" name="code" value="SP0001" readonly />
              </div>
              <div class="add-form-row">
                <label>Tên nhà cung cấp</label>
                <input class="add-form-field" name="name" required />
              </div>
            
              <div class="add-form-row">
                <label>Mã số thuế</label>
                <input class="add-form-field" name="price" type="text" required />
              </div>
             
            </div>
            <div class="col">
              <div class="add-form-row">
                <label>Đia chỉ</label>
                <input class="add-form-field" name="size" required />
              </div>
              <div class="add-form-row">
                <label>số điẹn thoại</label>
                <input class="add-form-field" name="material" required />
              </div>
              <div class="add-form-row">
                <label>email</label>
                <input class="add-form-field" name="type" required />
              </div>
              <div class="add-form-row">
                <label>Mô tả</label>
                <input class="add-form-field" name="note" />
              </div>
            </div>
          </div>
          <div class="add-form-btns">
            <button type="button" class="add-form-btn" id="cancelBtn">Quay lại</button>
            <button type="submit" class="add-form-btn confirm">Xác nhận</button>
          </div>
        </form>
      </div>
    `;
            document.getElementById('cancelBtn').onclick = function() {
                addFormRoot.innerHTML = '';
            };
            document.getElementById('overlayForm').onclick = function(e) {
                if (e.target === this) addFormRoot.innerHTML = '';
            };
            document.getElementById('addForm').onsubmit = function(e) {
                e.preventDefault();
                if (!validateProductForm(this)) return;
                let fd = new FormData(this);
                let tr = document.createElement('tr');
                tr.innerHTML = `
        <td>${fd.get('code')}</td>
        <td>${fd.get('name')}</td>
        <td>${fd.get('qty')}</td>
        <td>${fd.get('price')}</td>
        <td>${fd.get('material')}</td>
        <td>${fd.get('type')}</td>
        <td>${fd.get('size')}</td>
        <td>${fd.get('date')}</td>
        <td>${fd.get('note')}</td>
      `;
                document.querySelector('#productTable tbody').appendChild(tr);
                addFormRoot.innerHTML = '';
                showPopup('success', 'Thêm thành công!');
                setTimeout(() => document.getElementById('popup-root').innerHTML = '', 1200);
            };
        }

        // Sidebar active (giữ lại trạng thái chọn)
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.addEventListener('click', function(e) {
                document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                if (this.innerText.trim() === 'Trang chủ') {
                    window.location.href = '/';
                }
            });
        });

        // Optional: hiệu ứng popup
        const style = document.createElement('style');
        style.innerHTML = `
    @keyframes popIn {
      from { transform: scale(.85); opacity: 0; }
      to   { transform: scale(1); opacity: 1; }
    }
    .error-msg {
      color: #e84f3e;
      font-size: 0.99em;
      margin: 3px 0 0 4px;
    }
  `;
        document.head.appendChild(style);

        // Chuyển ngày từ bảng (dạng 2/25/2025) về dạng input type="date" (2025-02-25)
        function convertDateForInput(str) {
            if (!str) return '';
            let parts = str.split('/');
            if (parts.length === 3) {
                return `${parts[2]}-${parts[0].padStart(2, '0')}-${parts[1].padStart(2, '0')}`;
            }
            return str;
        }
    </script>

</body>

</html>