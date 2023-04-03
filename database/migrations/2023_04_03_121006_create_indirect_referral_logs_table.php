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
        Schema::create('indirect_referral_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upline_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('downline_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('amount', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirect_referral_logs');
    }
};
