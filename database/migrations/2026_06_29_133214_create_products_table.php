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

            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('league_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('club_id')->nullable()->constrained()->nullOnDelete();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('summary')->nullable();
            $table->longText('description')->nullable();

            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('base_price', 12, 2)->nullable();
            $table->char('currency', 3)->default(config('app.currency'));

            $table->enum('gender', ['men', 'women', 'kids', 'unisex'])->default('unisex');

            $table->string('cover')->nullable();
            $table->text('gallery')->nullable();

            $table->unsignedInteger('views')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('has_variants')->default(false);

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->boolean('active')->default(true);

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
