<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('category')->nullable();
            $table->string('size')->nullable();

            $table->text('short_description')->nullable();

            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};