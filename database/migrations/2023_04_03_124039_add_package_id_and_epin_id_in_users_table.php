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
            $table->foreignId('package_id')->nullable();
            $table->foreignId('epin_id')->nullable();
            $table->float('indirect_ref_bonus', 12, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('package_id');
            $table->dropColumn('epin_id');
            $table->dropColumn('indirect_ref_bonus');
        });
    }
};
