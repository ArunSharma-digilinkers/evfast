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
        Schema::create('abandoned_checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 10);
            $table->text('address')->nullable();
            $table->string('pincode', 6)->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->json('cart_data');
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('coupon_code')->nullable();
            $table->boolean('recovered')->default(false);
            $table->foreignId('recovered_order_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abandoned_checkouts');
    }
};
