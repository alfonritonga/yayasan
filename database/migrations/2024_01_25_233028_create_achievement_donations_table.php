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
        Schema::create('achievement_donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achievements_id');
            $table->text('name')->nullable();
            $table->decimal('total_donation', 12, 2)->nullable();

            $table->foreign('achievements_id')->references('id')->on('achievements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement_donations');
    }
};
