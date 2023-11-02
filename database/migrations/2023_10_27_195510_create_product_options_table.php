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
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->unique(['key', 'value']);
            $table->timestamps();
        });

        Schema::create('product_item_product_option', function (Blueprint $table) {
            $table->foreignId('product_item_id')->constrained();
            $table->foreignId('product_option_id')->constrained();
            $table->primary(['product_item_id', 'product_option_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_options');
        Schema::dropIfExists('product_item_product_option');
    }
};
