@extends('layouts.app') {{-- Nếu có layout --}}
@section('content')
<div class="topbar"><h1>Thêm phiếu xuất</h1></div>
<div class="form-area">
    {{-- Không cần action/store nếu chỉ demo --}}
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
                    <th></th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Nhà cung cấp</th>
                    <th>Số lượng tồn</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody id="prodTbody">
                @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>
                        <select name="products[{{ $i }}][product_code]" onchange="fillProductInfo(this)">
                            <option value="">▼</option>
                            @foreach($products as $p)
                                <option value="{{ $p->code }}"
                                    data-name="{{ $p->name }}"
                                    data-supplier="{{ $p->supplier->name ?? '' }}"
                                    data-stock="{{ $p->stock }}"
                                    data-price="{{ $p->price }}">
                                    {{ $p->code }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="ma-sp"></td>
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
            <a href="{{ route('stockout.index') }}" class="action-btn">Quay lại</a>
            <button type="button" class="action-btn" onclick="alert('Demo: đã thêm phiếu xuất!')">Xác nhận</button>
        </div>
    </form>
</div>
@endsection
