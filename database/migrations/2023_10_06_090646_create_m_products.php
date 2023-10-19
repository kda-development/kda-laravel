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
        Schema::create('m_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku');
            $table->string('merchant_code');
            $table->integer('price_original')->nullable()->default(0);
            $table->integer('price_discount')->nullable()->default(0);
            $table->string('slug');
            $table->string('desc');
            $table->string('highlight')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('stock')->nullable();
            $table->char('is_out_of_stock', 1)->default(0);
            $table->char('is_infinity_stock', 1)->default(0);
            $table->char('is_active', 1)->default(1);
            $table->timestamps();
        });

        Schema::table('m_products', function (Blueprint $table) {
            $table->integer('created_by')->after('created_at')->nullable();
            $table->integer('updated_by')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_products');
    }
};
