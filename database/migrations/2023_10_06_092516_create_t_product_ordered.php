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
        Schema::create('t_product_ordered', function (Blueprint $table) {
            $table->id();
            $table->string('batch_order');
            $table->unsignedBigInteger('customer_id');
            $table->char('is_paid', 1)->default(0);
            $table->integer('paid_pay')->nullable();
            $table->integer('paid_back')->nullable();
            $table->string('paid_payment')->nullable();
            $table->char('is_completed', 1)->default(0);
            $table->dateTime('completed_at')->nullable();
            $table->unsignedBigInteger('completed_by')->nullable();
            $table->timestamps();
        });

        Schema::table('t_product_ordered', function (Blueprint $table) {
            $table->integer('created_by')->after('created_at')->nullable();
            $table->integer('updated_by')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_product_ordered');
    }
};
