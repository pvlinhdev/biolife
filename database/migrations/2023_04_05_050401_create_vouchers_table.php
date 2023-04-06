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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->String('code', 10)->unique();
            $table->float('discount', 5, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('quantity_used')->default(0);
            $table->timestamp('time_from')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('time_end')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
        // check quantity used <= quantity
        // DB::statement('ALTER TABLE vouchers ADD CONSTRAINT quantity_check CHECK (quantity_used <= quantity)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
