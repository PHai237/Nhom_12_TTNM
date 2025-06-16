<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WearlyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wearly')->insert([
            [
                // Sản phẩm 1: Quần đùi
                'product_id' => 'SP0001',
                'product_name' => 'Quần đùi',
                'quantity' => 20,
                'price' => 70000,
                'material' => 'Cotton',
                'type' => 'Quần',
                'size' => 'M',
                'note' => 'Hàng loại 2',
                // Nhà cung cấp: Mặc Tỉnh Dress (MCC003)
                'supplier_id' => 'MCC003',
                'supplier_name' => 'Mặc Tỉnh Dress',
                'tax' => '8709998635',
                'address' => 'Từ Sơn, Bắc Ninh',
                'phone' => '0398776395',
                'email' => 'tinhdrss44@gmail.com',
                // Phiếu nhập: MPN001
                'stock_in_id' => 'MPN001',
                'import_date' => '2025-06-08',
                'staff_id' => 'NV001',
                // Phiếu xuất: MPX001
                'stock_out_id' => 'MPX001',
                'export_date' => '2025-06-05',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // Sản phẩm 2: Quần dài
                'product_id' => 'SP0002',
                'product_name' => 'Quần dài',
                'quantity' => 50,
                'price' => 170000,
                'material' => 'Bò',
                'type' => 'Quần',
                'size' => 'M',
                'note' => 'Hàng loại 2',
                // Nhà cung cấp: May Mặc Hà Thành (MCC002)
                'supplier_id' => 'MCC002',
                'supplier_name' => 'May Mặc Hà Thành',
                'tax' => '3703337036',
                'address' => 'Mỹ Đình, Hà Nội',
                'phone' => '0988345610',
                'email' => 'mhathanh@gmail.com',
                // Phiếu nhập: MPN002
                'stock_in_id' => 'MPN002',
                'import_date' => '2025-06-09',
                'staff_id' => 'NV002',
                // Phiếu xuất: MPX002
                'stock_out_id' => 'MPX002',
                'export_date' => '2025-06-08',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // Sản phẩm 3: Áo phông
                'product_id' => 'SP0003',
                'product_name' => 'Áo phông',
                'quantity' => 20,
                'price' => 220000,
                'material' => 'Cotton',
                'type' => 'Áo',
                'size' => 'L',
                'note' => 'Hàng loại 1',
                // Nhà cung cấp: Áo Da Flora (MCC001)
                'supplier_id' => 'MCC001',
                'supplier_name' => 'Áo Da Flora',
                'tax' => '67033360362',
                'address' => 'Ba Đình, Hà Nội',
                'phone' => '0986547093',
                'email' => 'aoflora45@gmail.com',
                // Phiếu nhập: MPN003
                'stock_in_id' => 'MPN003',
                'import_date' => '2025-06-10',
                'staff_id' => 'NV003',
                // Phiếu xuất: MPX003
                'stock_out_id' => 'MPX003',
                'export_date' => '2025-06-10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
