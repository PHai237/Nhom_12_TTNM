<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhà Cung Cấp</title>
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam+Pro:400,600,700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Be Vietnam Pro', sans-serif; }
        html, body { margin: 0; padding: 0; height: 100%; }
        body { background: #faf3dd; }
        .container { display: flex; flex-direction: column; min-height: 100vh; }
        .topbar {
            height: 80px;
            background-color: #a8d5ba;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: relative;
        }
        .left-group { display: flex; align-items: center; gap: 15px; }
        .wearly-logo { height: 50px; }
        .menu-toggle {
            width: 30px; height: 24px; display: flex; flex-direction: column;
            justify-content: space-between; cursor: pointer;
        }
        .menu-toggle span {
            height: 4px; background: #000; border-radius: 2px;
        }
        .brand-name {
            position: absolute; left: 50%; transform: translateX(-50%);
            font-size: 40px; font-weight: bold; color: #000;
            letter-spacing: 2px;
        }
        .avatar {
            width: 48px; height: 48px; border-radius: 50%; object-fit: cover;
            background: #fff;
        }
        .layout { display: flex; flex: 1; min-height: 0; }
        .sidebar {
            background-color: #a8d5ba; width: 80px; min-width: 80px;
            padding: 20px 10px; display: flex; flex-direction: column; gap: 22px;
            transition: width 0.3s;
            align-items: center;
        }
        .sidebar-item {
            display: flex; align-items: center; gap: 10px;
            font-size: 17px; color: #000; white-space: nowrap; text-decoration: none;
            font-weight: 500; padding: 8px 0; border-radius: 10px; transition: 0.2s;
        }
        .sidebar-item.active, .sidebar-item:hover {
            background: #e8f7ef;
        }
        .sidebar-item img {
            width: 28px; height: 28px;
        }
        .main {
            flex: 1; background: #faf3dd; padding: 40px 0 40px 0; min-width: 0;
            display: flex; flex-direction: column; align-items: center;
        }
        .main > h2 {
            font-size: 38px;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin-bottom: 26px;
            color: #111;
        }
        .header-bar {
            width: 92%; display: flex; gap: 14px; justify-content: flex-end;
            margin-bottom: 20px;
        }
        .search {
            padding: 10px 18px; border-radius: 20px; border: 1px solid #ccc;
            font-size: 17px;
        }
        .icon-btn, .add-btn {
            background-color: #a8d5ba; border: none; padding: 10px 22px;
            border-radius: 20px; cursor: pointer; font-weight: 600;
            font-size: 17px;
            transition: background 0.2s;
        }
        .icon-btn:hover, .add-btn:hover { background: #24a273; color: #fff; }
        table {
            width: 92%; border-collapse: collapse; background: #fff;
            border-radius: 18px; overflow: hidden; box-shadow: 0 2px 12px #dbe8e0;
        }
        th, td {
            border: none; padding: 14px 12px; text-align: center; font-size: 17px;
        }
        th {
            background-color: #a8d5ba; font-size: 17.5px; font-weight: 700;
        }
        tbody tr:nth-child(even) { background: #f6f9f6; }
        .action-buttons {
            width: 92%;
            display: flex; gap: 24px; margin: 26px 0 0 0; justify-content: flex-end;
        }
        .action-buttons button {
            padding: 10px 28px; background: #a8d5ba; border: none; border-radius: 20px;
            font-size: 17px; font-weight: 600; cursor: pointer; display: flex; align-items: center;
            gap: 7px; transition: background 0.2s;
        }
        .action-buttons button:hover { background: #24a273; color: #fff; }
        .action-buttons img { width: 20px; }

        /* Modal sửa NCC */
        .modal {
            display: none; position: fixed; z-index: 1000; left: 0; top: 0;
            width: 100vw; height: 100vh; background: rgba(0,0,0,0.20);
            justify-content: center; align-items: center;
        }
        .modal-content {
            background: #fdf8f6;
            padding: 32px 48px;
            border-radius: 18px;
            min-width: 500px;
            box-shadow: 0 6px 32px 0 #c0dac8;
            max-width: 95vw;
        }
        .modal-content h2 {
            margin: 0 0 30px 0;
            font-size: 30px;
            text-align: center;
            font-weight: 700;
        }
        .form-row {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
        }
        .form-row label {
            margin-bottom: 7px;
            font-weight: 600;
            font-size: 16px;
        }
        .form-row input {
            padding: 11px 18px;
            border-radius: 18px;
            border: 1px solid #a8d5ba;
            background: #eaf5ee;
            font-size: 16px;
            outline: none;
        }
        .modal-actions {
            display: flex; justify-content: flex-end; gap: 22px; margin-top: 30px;
        }
        .modal-actions button {
            padding: 10px 30px;
            border-radius: 20px;
            background: #a8d5ba;
            border: none;
            font-weight: bold;
            font-size: 17px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .modal-actions button:hover { background: #24a273; color: #fff; }
        @media (max-width: 600px) {
            .modal-content { min-width: 95vw; padding: 16px; }
            .main { padding: 0; }
            table, .header-bar, .action-buttons { width: 99vw !important; }
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Topbar -->
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
                <img src="{{ asset('img/home.png') }}"><span style="display:none;">Trang chủ</span>
            </a>
            <a href="#" class="sidebar-item">
                <img src="{{ asset('img/product.png') }}"><span style="display:none;">Quản lý sản phẩm</span>
            </a>
            <a href="#" class="sidebar-item">
                <img src="{{ asset('img/producer.png') }}"><span style="display:none;">Quản lý nhà cung cấp</span>
            </a>
            <a href="#" class="sidebar-item">
                <img src="{{ asset('img/stock_in.png') }}"><span style="display:none;">Quản lý nhập kho</span>
            </a>
            <a href="#" class="sidebar-item">
                <img src="{{ asset('img/Stock_out.png') }}"><span style="display:none;">Quản lý xuất kho</span>
            </a>
            <a href="#" class="sidebar-item">
                <img src="{{ asset('img/home.png') }}"><span style="display:none;">Báo cáo thống kê</span>
            </a>
        </div>

        <!-- MAIN -->
        <div class="main">
            <h2>Quản Lý Nhà Cung Cấp</h2>
            <div class="header-bar">
                <input class="search" type="text" id="searchInput" placeholder="Tìm kiếm">
                <button class="icon-btn" onclick="filterTable()">🔍</button>
                <button class="add-btn">➕ Thêm</button>
            </div>
            <table id="producerTable">
                <thead>
                <tr>
                    <th>Mã nhà cung cấp</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Mã số thuế</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
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
                    <td>nccA@gmail.com</td>
                    <td>Cung cấp váy</td>
                </tr>
                <tr>
                    <td>MCC002</td>
                    <td>May Mặc Hà Thành</td>
                    <td>3703337036</td>
                    <td>Mỹ Đình, Hà Nội</td>
                    <td>0988345610</td>
                    <td>mhathanh@gmail.com</td>
                    <td>Chất liệu đẹp, mát</td>
                </tr>
                </tbody>
            </table>
            <div class="action-buttons">
                <button id="editBtn"><img src="{{ asset('img/edit.png') }}">Sửa</button>
                <button><img src="{{ asset('img/delete.png') }}">Xóa</button>
            </div>
        </div>
    </div>

    <!-- Modal Sửa NCC -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h2>Sửa nhà cung cấp</h2>
            <form id="editForm" autocomplete="off">
                <div class="form-row">
                    <label>Mã nhà cung cấp</label>
                    <input type="text" id="editMaNCC" readonly>
                </div>
                <div class="form-row">
                    <label>Tên nhà cung cấp <span style="color:red">*</span></label>
                    <input type="text" id="editTenNCC" required>
                </div>
                <div class="form-row">
                    <label>Mã số thuế <span style="color:red">*</span></label>
                    <input type="text" id="editMST" required>
                </div>
                <div class="form-row">
                    <label>Địa chỉ <span style="color:red">*</span></label>
                    <input type="text" id="editDiaChi" required>
                </div>
                <div class="form-row">
                    <label>Số điện thoại <span style="color:red">*</span></label>
                    <input type="text" id="editSDT" required>
                </div>
                <div class="form-row">
                    <label>Email <span style="color:red">*</span></label>
                    <input type="email" id="editEmail" required>
                </div>
                <div class="form-row">
                    <label>Mô tả chi tiết</label>
                    <input type="text" id="editMoTa">
                </div>
                <div class="modal-actions">
                    <button type="button" onclick="closeEditModal()">Quay lại</button>
                    <button type="submit">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPT -->
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('hide');
        // Hiện/ẩn label text menu
        let sidebar = document.getElementById('sidebar');
        let labels = sidebar.querySelectorAll('span');
        labels.forEach(span => span.style.display = sidebar.classList.contains('hide') ? 'none' : 'inline');
    }

    // Tìm kiếm
    function filterTable() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let table = document.getElementById('producerTable');
        let trs = table.getElementsByTagName('tr');
        for (let i = 1; i < trs.length; i++) {
            let row = trs[i];
            let text = row.textContent.toLowerCase();
            row.style.display = text.indexOf(input) > -1 ? '' : 'none';
        }
    }
    document.getElementById('searchInput').addEventListener('keyup', filterTable);

    // Xử lý popup sửa nhà cung cấp
    function openEditModal(data) {
        document.getElementById('editMaNCC').value = data[0];
        document.getElementById('editTenNCC').value = data[1];
        document.getElementById('editMST').value = data[2];
        document.getElementById('editDiaChi').value = data[3];
        document.getElementById('editSDT').value = data[4];
        document.getElementById('editEmail').value = data[5];
        document.getElementById('editMoTa').value = data[6] || '';
        document.getElementById('editModal').style.display = 'flex';
    }
    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }
    // Khi nhấn "Sửa": lấy dòng đầu tiên (hoặc đổi thành dòng đang chọn)
    document.getElementById('editBtn').onclick = function() {
        let firstRow = document.querySelector('#producerTable tbody tr');
        let cells = firstRow.querySelectorAll('td');
        let data = Array.from(cells).map(cell => cell.innerText);
        openEditModal(data);
    };
    // Đóng modal khi click ngoài vùng nội dung (UX tốt hơn)
    document.getElementById('editModal').onclick = function(e) {
        if (e.target === this) closeEditModal();
    };
    // Submit cập nhật NCC
    document.getElementById('editForm').onsubmit = function(e) {
        e.preventDefault();
        // TODO: Gửi dữ liệu lên backend hoặc cập nhật bảng, tuỳ bạn!
        alert('Đã lưu cập nhật!');
        closeEditModal();
    };
</script>
</body>
</html>
