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
        Schema::create('feature_items', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->foreignId('feature_group_id')->constrained();
            $table->unique(['key', 'value', 'feature_group_id']);
            $table->timestamps();
        });

        Schema::create('feature_item_product', function (Blueprint $table) {
            $table->foreignId('feature_item_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->primary(['feature_item_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_items');
        Schema::dropIfExists('feature_item_product');
    }
};
