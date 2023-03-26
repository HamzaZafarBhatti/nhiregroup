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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('avatar')->nullable();
            $table->float('ref_bonus', 12, 2)->default(0);
            $table->float('points')->default(0);
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->boolean('darkmode')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('avatar');
            $table->dropColumn('ref_bonus');
            $table->dropColumn('points');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zipcode');
            $table->dropColumn('country');
            $table->dropColumn('phone');
            $table->dropColumn('parent_id');
            $table->dropColumn('is_blocked');
            $table->dropColumn('darkmode');
        });
    }
};
