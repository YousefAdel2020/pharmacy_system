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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('ordered_by_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('pharmacy_id')->nullable();
            
            
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');
            $table->foreign('ordered_by_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
