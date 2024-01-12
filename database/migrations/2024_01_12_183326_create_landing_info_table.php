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
        Schema::create('landing_info', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->text('history')->nullable();
            $table->text('visi_mission')->nullable();
            $table->text('partnership')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_info');
    }
};
