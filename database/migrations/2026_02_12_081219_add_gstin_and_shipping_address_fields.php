<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('gstin', 15)->nullable()->after('city');
            $table->string('shipping_name')->nullable()->after('gstin');
            $table->string('shipping_phone', 10)->nullable()->after('shipping_name');
            $table->text('shipping_address')->nullable()->after('shipping_phone');
            $table->string('shipping_pincode', 6)->nullable()->after('shipping_address');
            $table->string('shipping_state')->nullable()->after('shipping_pincode');
            $table->string('shipping_city')->nullable()->after('shipping_state');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('gstin', 15)->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'gstin',
                'shipping_name',
                'shipping_phone',
                'shipping_address',
                'shipping_pincode',
                'shipping_state',
                'shipping_city',
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gstin');
        });
    }
};
