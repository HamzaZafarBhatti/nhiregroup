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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('grade');
            $table->integer('direct_ref_bonus');
            $table->integer('indirect_ref_bonus');
            $table->boolean('is_active')->default(true);
            $table->string('epin_prefix');
            $table->integer('epin_length');
            $table->integer('min_points_to_cashout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
