<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trang Quản Lý</title>
    <style>
      @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");

      * {
        box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        font-family: 'Be Vietnam Pro', sans-serif;
      }

      html, body {
        margin: 0;
        height: 100%;
      }

      a {
        text-decoration: none;
      }

      .bo-co-tn-kho {
        position: relative;
        width: 100%;
        height: 100vh;
        background-color: #a8d5ba;
        overflow: hidden;
      }

      .sidebar {
        position: absolute;
        top: 0;
        left: 0;
        width: 100px;
        height: 100%;
        background-color: #a8d5ba;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 140px;
        gap: 40px;
      }

      .sidebar-icon {
        width: 32px;
        height: 32px;
        cursor: pointer;
      }

      .wearly-logo {
        position: absolute;
        width: 109px;
        height: 110px;
        top: 20px;
        left: 20px;
        object-fit: cover;
        z-index: 10;
      }

      .text-wrapper-3 {
        position: absolute;
        top: 50px;
        left: 50%;
        transform: translateX(-50%);
        font-weight: 700;
        color: #000000;
        font-size: 50px;
        white-space: nowrap;
      }

      .image {
        position: absolute;
        width: 70px;
        height: 70px;
        top: 30px;
        right: 40px;
        object-fit: cover;
        border-radius: 50%;
      }

      .frame {
        position: absolute;
        top: 150px;
        left: 160px;
        width: calc(100% - 180px);
        background-color: #faf3dd;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 40px 60px;
        padding: 60px;
        border-radius: 20px;
        justify-content: center;
      }

      .function-block {
        width: 260px;
        height: 200px;
        background-color: #a8d5ba;
        border-radius: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .function-block:hover {
        transform: scale(1.05);
      }

      .function-block img {
        width: 90px;
        height: 90px;
        object-fit: contain;
      }

      .function-block p {
        font-size: 22px;
        color: #000000;
        text-align: center;
        margin: 0;
      }
    </style>
  </head>
  <body>
    <div class="bo-co-tn-kho">
      <!-- Sidebar -->
      <div class="sidebar">
        <img src="./img/product.png" class="sidebar-icon" />
        <img src="./img/producer.png" class="sidebar-icon" />
        <img src="./img/stock_in.png" class="sidebar-icon" />
        <img src="./img/stock_out.png" class="sidebar-icon" />
        <img src="./img/inventory_report.png" class="sidebar-icon" />
      </div>

      <!-- Logo + Header -->
      <img class="wearly-logo" src="./img/wearly_logo.png" />
      <div class="text-wrapper-3">WEARLY</div>
      <img class="image" src="./img/user_avt.png" />

      <!-- Main content -->
      <div class="frame">
        <div class="function-block">
          <img src="./img/product.png" />
          <p>Quản lý sản phẩm</p>
        </div>
        <div class="function-block">
          <img src="./img/producer.png" />
          <p>Quản lý nhà cung cấp</p>
        </div>
        <div class="function-block">
          <img src="./img/stock_in.png" />
          <p>Quản lý nhập kho</p>
        </div>
        <div class="function-block">
          <img src="./img/stock_out.png" />
          <p>Quản lý xuất kho</p>
        </div>
        <div class="function-block">
          <img src="./img/inventory_report.png" />
          <p>Báo cáo thống kê</p>
        </div>
      </div>
    </div>
  </body>
</html>
