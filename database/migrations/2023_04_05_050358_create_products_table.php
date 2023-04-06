<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->String('name', 128);
            $table->String('slug', 128)->nullable();
            $table->integer('quantity')->default(0);
            $table->decimal('price', 10, 2);
            $table->String('description', 1028);
            $table->integer('sold')->default(0);
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();

            // $table->decimal('discount', 10, 2);

        });
        // check discount < price
        // DB::statement('ALTER TABLE products ADD CONSTRAINT price_check CHECK (discount < price)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
