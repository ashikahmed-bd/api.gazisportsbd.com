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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->string('sku')->nullable();

            $table->string('name')->nullable();

            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('base_price', 12, 2)->nullable();

            $table->unsignedInteger('stock')->default(0);

            $table->unsignedInteger('low_stock_threshold')
                ->default(5);

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique([
                'product_id',
                'sku',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
