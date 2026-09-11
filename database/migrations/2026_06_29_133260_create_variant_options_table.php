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
        Schema::create('variant_options', function (Blueprint $table) {
            $table->id();

            $table->foreignId('variant_id')
                ->constrained('variants')
                ->cascadeOnDelete();

            $table->foreignId('attribute_id')
                ->constrained('attributes')
                ->cascadeOnDelete();

            $table->foreignId('attribute_option_id')
                ->constrained('attribute_options')
                ->cascadeOnDelete();


            $table->timestamps();

            // One option per attribute for each variant
            $table->unique([
                'variant_id',
                'attribute_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_options');
    }
};
