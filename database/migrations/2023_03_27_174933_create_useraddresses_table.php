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
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('area_id');
            $table->string('street');
            $table->string('country');
            $table->string('city');
            $table->integer('floor_num');
            $table->integer('apartment_num');
            $table->boolean('is_primary_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useraddresses');
    }
};
