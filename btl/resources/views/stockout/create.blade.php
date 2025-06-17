{{-- resources/views/stockout/create.blade.php --}}
@php
$products = [
    (object)[
        'code' => 'SP001', 'name' => 'Váy xòe', 'stock' => 120, 'price' => 140000,
        'supplier' => (object)['name'=>'May Mặc Hoa Sen']
    ],
    (object)[
        'code' => 'SP002', 'name' => 'Áo thun', 'stock' => 75, 'price' => 90000,
        'supplier' => (object)['name'=>'Thời trang Hồng Hà']
    ],
    (object)[
        'code' => 'SP003', 'name' => 'Quần short', 'stock' => 60, 'price' => 85000,
        'supplier' => (object)['name'=>'May Mặc Minh Châu']
    ]
];
$employees = [
    (object)['code' => 'NV001'],
    (object)['code' => 'NV002'],
];
$nextCode = 'MPX003';
@endphp

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm phiếu xuất</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #faf3dd;
      margin: 0; padding: 0;
      font-family: 'Be Vietnam Pro', Arial, sans-serif;
    }
    .topbar { background: #a8d5ba; padding: 18px 0; text-align: center; box-shadow: 0 2px 14px 2px #dbe8e0;}
    .topbar h1 { margin: 0; color: #228e5f; font-size: 30px; }
    .form-area {
      background: #fff;
      margin: 40px auto 0 auto;
      border-radius: 20px;
      box-shadow: 0 2px 14px 2px #dbe8e0;
      max-width: 900px; padding: 32px 28px;
    }
    .form-row {
      display: flex; gap: 28px; align-items: center; margin-bottom: 20px; flex-wrap: wrap;
    }
    .form-label { min-width: 120px; font-weight: 600; color: #228e5f; }
    .form-value, input[type="date"], select { padding: 7px 12px; border-radius: 8px; border: 1px solid #b7dfcc; min-width: 120px;}
    input[type="date"] { border: 1px solid #b7dfcc; }
    table.product-table {
      width: 100%; border-collapse: collapse; margin-bottom: 18px; background: #f8fff9;
      box-shadow: 0 1px 5px #dbe8e0; border-radius: 12px; overflow: hidden;
    }
    .product-table th, .product-table td {
      border: 1px solid #b7dfcc; padding: 8px 7px; text-align: center;
      font-size: 16px;
    }
    .product-table th {
      background: #b7dfcc; color: #145c39; font-weight: 700; user-select: none;
    }
    .product-table tr:nth-child(even) { background: #f3fff5; }
    .product-table tr:hover td { background: #e5ffef; }
    .remove-btn {
      background: #fff0f0; color: #b30000; border: none; padding: 5px 16px; border-radius: 9px;
      font-weight: 600; cursor: pointer; font-size: 15px; transition: background .17s;
    }
    .remove-btn:hover { background: #ffd5d5; }
    .total-row {
      display: flex; gap: 35px; align-items: center; font-weight: 600; margin-bottom: 14px; color: #165e41;
    }
    .total-label { min-width: 110px;}
    .total-value { min-width: 68px; font-size: 18px;}
    .action-row { margin-top: 16px; display: flex; gap: 18px;}
    .action-btn {
      background: #a8d5ba; color: #145c39; border: none; border-radius: 15px;
      padding: 9px 30px; font-size: 18px; font-weight: 600; cursor: pointer; text-decoration: none; transition: background .17s;
    }
    .action-btn:hover { background: #7fd9b8; color: #000; }
    @media (max-width: 600px) {
      .form-row { flex-direction: column; gap: 12px;}
      .form-area { padding: 7vw 2vw;}
      .topbar h1 { font-size: 20px;}
    }
  </style>
</head>
<body>
<div class="topbar"><h1>Thêm phiếu xuất</h1></div>
<div class="form-area">
    <form id="stockoutForm" autocomplete="off">
        <div class="form-row">
            <span class="form-label">Mã phiếu xuất</span>
            <span class="form-value" id="maPhieu">{{ $nextCode }}</span>
            <input type="hidden" name="code" value="{{ $nextCode }}">
            <span class="form-label">Ngày xuất</span>
            <input type="date" name="date" value="{{ date('Y-m-d') }}">
            <span class="form-label">Mã nhân viên</span>
            <select name="employee_code" class="form-value">
                @foreach($employees as $emp)
                    <option value="{{ $emp->code }}">{{ $emp->code }}</option>
                @endforeach
            </select>
        </div>
        <table class="product-table" id="prodTable">
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
                @for ($i = 0; $i < 5; $i++)
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
                    <td><input type="number" min="0" name="products[{{ $i }}][quantity]" class="so-luong" oninput="calcTotal()"></td>
                    <td class="gia-sp"></td>
                    <td><button type="button" class="remove-btn" onclick="removeRow(this)">Xoá 🗑️</button></td>
                </tr>
                @endfor
            </tbody>
        </table>
        <div class="total-row">
            <span class="total-label">Tổng sản phẩm</span>
            <span class="total-value" id="tongSanPham">0</span>
            <span class="total-label">Tổng tiền</span>
            <span class="total-value" id="tongTien">0đ</span>
        </div>
        <div class="action-row">
            <a href="{{ route('stockout') }}" class="action-btn">Quay lại</a>
            <button type="button" class="action-btn" onclick="alert('Demo: đã thêm phiếu xuất!')">Xác nhận</button>
        </div>
    </form>
</div>
<script>
function fillProductInfo(select) {
    let option = select.selectedOptions[0];
    let row = select.closest('tr');
    row.querySelector('.ten-sp').textContent = option.dataset.name || '';
    row.querySelector('.ncc-sp').textContent = option.dataset.supplier || '';
    row.querySelector('.ton-sp').textContent = option.dataset.stock || '';
    row.querySelector('.gia-sp').textContent = option.dataset.price
        ? Number(option.dataset.price).toLocaleString() + 'đ' : '';
    calcTotal();
}
function removeRow(btn) {
    let row = btn.closest('tr');
    row.querySelectorAll('input,select').forEach(e => { if(e.tagName==='SELECT') e.selectedIndex=0; else e.value = ''; });
    row.querySelectorAll('td:not(:first-child):not(:last-child)').forEach(e => e.textContent = '');
    calcTotal();
}
function calcTotal() {
    let tbody = document.getElementById('prodTbody');
    let tongSL = 0, tongTien = 0;
    tbody.querySelectorAll('tr').forEach(row => {
        let sl = Number(row.querySelector('.so-luong')?.value) || 0;
        let gia = Number(row.querySelector('.gia-sp')?.textContent.replace(/\D/g, '')) || 0;
        if(sl > 0 && gia > 0) {
            tongSL += sl;
            tongTien += (sl * gia);
        }
    });
    document.getElementById('tongSanPham').textContent = tongSL;
    document.getElementById('tongTien').textContent = tongTien.toLocaleString() + 'đ';
}
</script>
</body>
</html>
