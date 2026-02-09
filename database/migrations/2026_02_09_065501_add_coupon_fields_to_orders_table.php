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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id')->nullable()->after('total_amount');
            $table->decimal('discount_amount', 10, 2)->default(0)->after('coupon_id');
            $table->decimal('subtotal', 10, 2)->default(0)->after('discount_amount');
            $table->decimal('gst_total', 10, 2)->default(0)->after('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['coupon_id', 'discount_amount', 'subtotal', 'gst_total']);
        });
    }
};
