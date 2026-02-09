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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('sale_price', 10, 2)
                  ->nullable()
                  ->after('price');

            $table->text('short_description')
                  ->nullable()
                  ->after('sale_price');

            $table->text('technical_features')
                  ->nullable()
                  ->after('short_description');

            $table->text('warranty')
                  ->nullable()
                  ->after('technical_features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
              $table->dropColumn([
                'sale_price',
                'short_description',
                'technical_features',
                'warranty'
            ]);
        });
    }
};
