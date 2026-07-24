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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('highlights')->nullable();
            $table->longText('description')->nullable();
            $table->text('options')->nullable();

            $table->decimal('base_price', 10, 2);
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);

            $table->enum('gender', ['men', 'women', 'kids', 'unisex'])->default('unisex');

            $table->string('cover')->nullable();
            $table->text('gallery')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->unsignedInteger('views')->default(0);
            $table->boolean('featured')->default(false);

            $table->boolean('active')->default(true);

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('club_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
