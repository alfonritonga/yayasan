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
        Schema::create('uyt_articles', function (Blueprint $table) {
            $table->id();
            $table->string('guid')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('media')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('uyt_videos', function (Blueprint $table) {
            $table->id();
            $table->string('guid')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('media')->nullable();
            $table->string('url_video');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uyt_videos');
        Schema::dropIfExists('uyt_articles');
    }
};
