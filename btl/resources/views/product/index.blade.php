<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Sản Phẩm</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Be Vietnam Pro', sans-serif;
    }

    body, html {
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

    .icon-btn, .add-btn {
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

    th, td {
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
        <div class="sidebar-item"><img src="{{ asset('img/product.png') }}"><span>Quản lý sản phẩm</span></div>
        <div class="sidebar-item"><img src="{{ asset('img/producer.png') }}"><span>Quản lý nhà cung cấp</span></div>
        <div class="sidebar-item"><img src="{{ asset('img/stock_in.png') }}"><span>Quản lý nhập kho</span></div>
        <div class="sidebar-item"><img src="{{ asset('img/stock_out.png') }}"><span>Quản lý xuất kho</span></div>
        <div class="sidebar-item"><img src="{{ asset('img/inventory_report.png') }}"><span>Báo cáo thống kê</span></div>
      </div>

      <!-- Main -->
      <div class="main">
        <h2>Quản Lý Sản Phẩm</h2>

        <!-- Tìm kiếm -->
        <div class="header-bar">
          <form action="{{ route('product.search') }}" method="GET" style="display: flex; gap: 10px;">
            <input class="search" type="text" name="keyword" placeholder="Tìm kiếm" value="{{ $keyword ?? '' }}">
            <button class="icon-btn" type="submit">🔍</button>
            <button class="add-btn" type="button">➕ Thêm</button>
          </form>
        </div>

        <!-- Bảng dữ liệu -->
        <table>
          <thead>
            <tr>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
              <th>Chất liệu</th>
              <th>Loại sản phẩm</th>
              <th>Kích cỡ</th>
              <th>Ngày nhập</th>
              <th>Ghi chú</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $item)
              <tr>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price}}</td>
                <td>{{ $item->material }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->import_date}}</td>
                <td>{{ $item->note }}</td>
              </tr>
            @endforeach
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
  </script>
</body>
</html>
