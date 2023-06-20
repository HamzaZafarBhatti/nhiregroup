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
        Schema::create('employer_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->boolean('is_active')->default(0);
            $table->date('post_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_posts');
    }
};
