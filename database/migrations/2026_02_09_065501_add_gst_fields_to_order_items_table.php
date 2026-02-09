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
        Schema::table('order_items', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->default(0)->after('price');
            $table->decimal('gst_percentage', 5, 2)->default(0)->after('base_price');
            $table->decimal('gst_amount', 10, 2)->default(0)->after('gst_percentage');
            $table->decimal('discount_amount', 10, 2)->default(0)->after('gst_amount');
            $table->decimal('total_price', 10, 2)->default(0)->after('discount_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['base_price', 'gst_percentage', 'gst_amount', 'discount_amount', 'total_price']);
        });
    }
};
