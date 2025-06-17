<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm phiếu nhập - WEARLY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --green: #b7dfcc;
            --green-light: #e6f7ef;
            --green-dark: #24a273;
            --yellow: #faf3dd;
            --input: #e0ede6;
            --shadow: 0 2px 14px 2px #dbe8e0;
        }
        html, body { margin: 0; padding: 0; height: 100%; background: var(--yellow);}
        * { box-sizing: border-box; font-family: 'Be Vietnam Pro', Arial, sans-serif; }
        .container { min-height: 100vh; display: flex; flex-direction: column; }
        .topbar {
            background: var(--green);
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow);
        }
        .topbar .wearly-logo { height: 52px; margin-left: 24px;}
        .topbar .brand { font-size: 44px; font-weight: 900; letter-spacing: 2px; color: #232323;}
        .topbar .avatar { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; margin-right: 26px; background: #fff;}
        .layout { display: flex; flex: 1; }
        .sidebar {
            background: #b7dfcc;
            width: 80px;
            min-width: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 12px 0;
            gap: 22px;
            box-shadow: var(--shadow);
        }
        .sidebar img { width: 38px; margin: 6px 0;}
        .main { flex: 1; display: flex; justify-content: center; align-items: flex-start; padding: 36px 0;}
        .form-box {
            width: 85%;
            background: #fff;
            border-radius: 20px;
            box-shadow: var(--shadow);
            padding: 36px 46px;
            margin: 0 auto;
            min-width: 780px;
        }
        .form-title {
            text-align: center;
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 32px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }
        .info-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
            width: 45%;
            margin-bottom: 8px;
        }
        .info-label {
            font-size: 18px;
            font-weight: 500;
            color: #232323;
        }
        .info-value, input[type="date"], select {
            background: var(--input);
            border-radius: 22px;
            border: none;
            font-size: 18px;
            padding: 7px 18px;
            color: #4d684f;
            margin-top: 2px;
        }
        input[type="date"]::-webkit-input-placeholder { color: #4d684f; }
        select { width: 100%; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            background: #fff;
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
        .table-scroll { max-height: 220px; overflow-y: auto;}
        .total-row {
            display: flex; align-items: center; gap: 25px; margin: 18px 0 0 0; justify-content: flex-end;
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
            text-align: right;
        }
        .form-action-row {
            display: flex;
            gap: 20px;
            justify-content: flex-end;
            margin-top: 30px;
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
    </style>
</head>
<body>
<div class="container">
    <!-- TOPBAR -->
    <div class="topbar">
        <img src="{{ asset('img/wearly_logo.png') }}" class="wearly-logo" alt="Logo">
        <div class="brand">WEARLY</div>
        <img src="{{ asset('img/user_avt.png') }}" class="avatar" alt="Avatar">
    </div>
    <div class="layout">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <img src="{{ asset('img/home.png') }}" title="Trang chủ">
            <img src="{{ asset('img/product.png') }}" title="Sản phẩm">
            <img src="{{ asset('img/producer.png') }}" title="Nhà cung cấp">
            <img src="{{ asset('img/stock_in.png') }}" title="Nhập kho">
            <img src="{{ asset('img/Stock_out.png') }}" title="Xuất kho">
            <img src="{{ asset('img/home.png') }}" title="Thống kê">
        </div>
        <!-- MAIN -->
        <div class="main">
            <div class="form-box">
                <div class="form-title">Thêm phiếu nhập</div>
                <form method="post" action="{{ route('stockin.store') }}">
                    @csrf
                    <div class="info-row">
                        <div class="info-group">
                            <div class="info-label">Mã phiếu nhập</div>
                            <div class="info-value">MPN003</div>
                        </div>
                        <div class="info-group">
                            <div class="info-label">Mã nhân viên</div>
                            <div class="info-value">NV003</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-group">
                            <div class="info-label">Ngày nhập</div>
                            <input type="date" name="import_date" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="info-group">
                            <div class="info-label">Mã nhà cung cấp</div>
                            <select name="supplier_id">
                                <option value="">-- Chọn --</option>
                                <option value="MCC001">MCC001</option>
                                <option value="MCC002">MCC002</option>
                                <option value="MCC003">MCC003</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-scroll">
                        <table>
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
                                            <button type="button" onclick="this.closest('tr').remove();">Xoá <span>🗑️</span></button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="total-row">
                        <span class="total-label">Tổng sản phẩm</span>
                        <span class="total-value" id="totalQty">0</span>
                        <span class="total-label">Tổng giá trị</span>
                        <span class="total-value" id="totalValue">0đ</span>
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
    // Tính tổng số lượng và tổng giá trị tự động (chưa ajax, dùng JS thuần)
    function updateTotals() {
        let totalQty = 0, totalVal = 0;
        document.querySelectorAll('tbody tr').forEach(row => {
            let qty = parseInt(row.querySelector('input[name*="[qty]"]')?.value || 0);
            let price = parseInt(row.querySelector('input[name*="[price]"]')?.value || 0);
            if(!isNaN(qty)) totalQty += qty;
            if(!isNaN(qty) && !isNaN(price)) totalVal += qty * price;
        });
        document.getElementById('totalQty').textContent = totalQty;
        document.getElementById('totalValue').textContent = totalVal.toLocaleString('vi-VN') + 'đ';
    }
    document.querySelectorAll('input[name*="[qty]"], input[name*="[price]"]').forEach(input => {
        input.addEventListener('input', updateTotals);
    });
    // Khi xoá dòng
    document.querySelectorAll('.action-cell button').forEach(btn => {
        btn.addEventListener('click', updateTotals);
    });
    // Cập nhật ban đầu
    updateTotals();
</script>
</body>
</html>
