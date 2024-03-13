<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('basket_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('quantity');
            $table->foreignId('basket_id')
                ->constrained('baskets')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('basket_product');
    }
};
