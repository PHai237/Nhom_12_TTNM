<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý sản phẩm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Be Vietnam Pro', sans-serif;
    }

    body {
      margin: 0;
      background-color: #a8d5ba;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100px;
      height: 100vh;
      background-color: #a8d5ba;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 140px;
      gap: 30px;
    }

    .sidebar img {
      width: 32px;
      height: 32px;
      cursor: pointer;
    }

    .header {
      position: fixed;
      top: 0;
      left: 100px;
      right: 0;
      height: 110px;
      background-color: #a8d5ba;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 10;
    }

    .header h1 {
      font-size: 40px;
      font-weight: bold;
      color: #000;
    }

    .avatar {
      position: absolute;
      top: 20px;
      right: 30px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
    }

    .logo {
      position: absolute;
      top: 15px;
      left: 20px;
      width: 80px;
      height: 80px;
      object-fit: cover;
    }

    .content {
      margin-left: 120px;
      margin-top: 140px;
      padding: 30px 60px;
      background-color: #faf3dd;
      min-height: calc(100vh - 140px);
    }

    .content h2 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .toolbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .toolbar input {
      padding: 8px;
      border-radius: 10px;
      border: 1px solid #ccc;
      width: 180px;
    }

    .toolbar button {
      padding: 8px 14px;
      border: none;
      background-color: #a8d5ba;
      border-radius: 10px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
      font-size: 15px;
    }

    th {
      background: #a8d5ba;
    }

    .footer-btn {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 10px;
    }

    .footer-btn button {
      padding: 8px 18px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .footer-btn .edit {
      background-color: #f0ad4e;
    }

    .footer-btn .delete {
      background-color: #d9534f;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="{{ asset('img/product.png') }}">
    <img src="{{ asset('img/producer.png') }}">
    <img src="{{ asset('img/stock_in.png') }}">
    <img src="{{ asset('img/stock_out.png') }}">
    <img src="{{ asset('img/inventory_report.png') }}">
  </div>

  <!-- Header -->
  <div class="header">
    <img src="{{ asset('img/wearly_logo.png') }}" class="logo">
    <h1>WEARLY</h1>
    <img src="{{ asset('img/user_avt.png') }}" class="avatar">
  </div>

  <!-- Main Content -->
  <div class="content">
    <h2>Quản Lý Sản Phẩm</h2>

    <div class="toolbar">
      <input type="text" placeholder="Tìm kiếm..." />
      <button>Thêm</button>
    </div>

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
          <th>Ngày tháng</th>
          <th>Ghi chú</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>SP0001</td>
          <td>Quần dài</td>
          <td>20</td>
          <td>70.000đ</td>
          <td>Cotton</td>
          <td>Quần</td>
          <td>M</td>
          <td>2/25/2025</td>
          <td>Hàng loại 2</td>
        </tr>
        <tr>
          <td>SP0002</td>
          <td>Quần dài</td>
          <td>50</td>
          <td>170.000đ</td>
          <td>Bò</td>
          <td>Quần</td>
          <td>M</td>
          <td>2/25/2025</td>
          <td>Hàng loại 2</td>
        </tr>
        <tr>
          <td>SP0003</td>
          <td>Áo phông</td>
          <td>20</td>
          <td>220.000đ</td>
          <td>Cotton</td>
          <td>Áo</td>
          <td>L</td>
          <td>2/25/2025</td>
          <td>Hàng loại 1</td>
        </tr>
      </tbody>
    </table>

    <div class="footer-btn">
      <button class="edit">Sửa</button>
      <button class="delete">Xoá</button>
    </div>
  </div>

</body>
</html>
