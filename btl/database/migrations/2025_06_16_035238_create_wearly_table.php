<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wearly', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('product_name');
            $table->integer('quantity');  
            $table->decimal('price', 15, 2);
            $table->string('material')->nullable();
            $table->string('type')->nullable(); 
            $table->string('size')->nullable();
            $table->string('note')->nullable();
            $table->string('supplier_id');
            $table->string('supplier_name');
            $table->string('tax')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('stock_in_id');
            $table->date('import_date');
            $table->string('staff_id');
            $table->string('stock_out_id');
            $table->date('export_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wearly');
    }
};
