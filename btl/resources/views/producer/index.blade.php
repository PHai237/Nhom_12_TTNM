<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhà Cung Cấp</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Be Vietnam Pro', sans-serif;
        }

        body,
        html {
            margin: 0;
            height: 100%;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .topbar {
            height: 80px;
            background-color: #a8d5ba;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: relative;
        }

        .left-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .wearly-logo {
            height: 50px;
        }

        .menu-toggle {
            width: 30px;
            height: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
        }

        .menu-toggle span {
            height: 4px;
            background: #000;
            border-radius: 2px;
        }

        .brand-name {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 28px;
            font-weight: bold;
            color: #000;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .layout {
            display: flex;
            flex: 1;
        }

        .sidebar {
            background-color: #a8d5ba;
            width: 220px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.hide {
            width: 70px;
            padding: 20px 10px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: #000;
            white-space: nowrap;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .sidebar.hide .sidebar-item span {
            display: none;
        }

        .sidebar-item img {
            width: 24px;
            height: 24px;
        }

        .main {
            flex: 1;
            background-color: #faf3dd;
            padding: 40px;
        }

        .header-bar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search {
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .icon-btn,
        .add-btn {
            background-color: #a8d5ba;
            border: none;
            padding: 10px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #a8d5ba;
        }

        h2 {
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            justify-content: flex-end;
        }

        .action-buttons button {
            padding: 10px 20px;
            background-color: #a8d5ba;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .action-buttons button img {
            width: 18px;
            margin-right: 6px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Topbar -->
        <div class="topbar">
            <div class="left-group">
                <img src="{{ asset('img/wearly_logo.png') }}" alt="Logo" class="wearly-logo">
                <div class="menu-toggle" onclick="toggleSidebar()">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <div class="brand-name">WEARLY</div>
            <img src="{{ asset('img/user_avt.png') }}" class="avatar" alt="Avatar">
        </div>

        <!-- Layout -->
        <div class="layout">
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <a href="/" class="sidebar-item" style="text-decoration: none;">
                    <img src="{{ asset('img/home.png') }}"><span>Trang chủ</span>
                </a>
                <div class="sidebar-item"><img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span></div>
                <div class="sidebar-item"><img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span></div>
                <div class="sidebar-item"><img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span></div>
                <div class="sidebar-item"><img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span></div>
                <div class="sidebar-item"><img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span></div>
            </div>

            <!-- Main -->
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
                    </tbody>

                </table>
                <div class="action-buttons">
                    <button><img src="{{ asset('img/edit.png') }}">Sửa</button>
                    <button><img src="{{ asset('img/delete.png') }}">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('hide');
        }
        // --- Tìm kiếm realtime ---
        function filterTable() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let table = document.getElementById('producerTable'); // Đúng id bảng
            let trs = table.getElementsByTagName('tr');
            for (let i = 1; i < trs.length; i++) {
                let row = trs[i];
                let text = row.textContent.toLowerCase();
                row.style.display = text.indexOf(input) > -1 ? '' : 'none';
            }
        }
        // Cho phép tìm kiếm khi gõ phím
        document.getElementById('searchInput').addEventListener('keyup', filterTable);
    </script>
</body>

</html>