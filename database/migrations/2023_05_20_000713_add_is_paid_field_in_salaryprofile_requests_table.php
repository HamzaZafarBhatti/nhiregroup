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
        Schema::table('salaryprofile_requests', function (Blueprint $table) {
            //
            $table->boolean('is_paid');
            $table->boolean('subadmin_approve_payment');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salaryprofile_requests', function (Blueprint $table) {
            //
            $table->dropColumn('is_paid');
            $table->dropColumn('subadmin_approve_payment');
        });
    }
};
