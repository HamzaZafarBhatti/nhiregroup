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
        Schema::create('employer_post_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->foreignId('employer_post_id');
            $table->foreignId('user_id');
            $table->boolean('cashed_out');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_post_users');
    }
};
