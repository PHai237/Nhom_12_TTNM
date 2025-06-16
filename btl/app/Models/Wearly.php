<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wearly extends Model
{
    protected $table = 'wearly';

    protected $fillable = [
        'product_id',
        'product_name',
        'quantity',
        'price',
        'material',
        'type',
        'size',
        'note',
        'supplier_id',
        'supplier_name',
        'tax',
        'address',
        'phone',
        'email',
        'stock_in_id',
        'import_date',
        'staff_id',
        'stock_out_id',
        'export_date',
    ];
    

}
