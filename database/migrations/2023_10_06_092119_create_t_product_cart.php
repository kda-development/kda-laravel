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
        Schema::create('t_product_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('product_sku');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total_price');
            $table->string('batch_order')->nullable();
            $table->unsignedBigInteger('process_by')->nullable();
            $table->dateTime('process_at')->nullable();
            $table->char('is_active', 1)->default(1);
            $table->timestamps();
        });

        Schema::table('t_product_cart', function (Blueprint $table) {
            $table->integer('created_by')->after('created_at')->nullable();
            $table->integer('updated_by')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_product_cart');
    }
};
