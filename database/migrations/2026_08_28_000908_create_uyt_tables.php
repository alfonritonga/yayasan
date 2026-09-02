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
        // 1. Tabel Konten Halaman UYT (CMS teks konten)
        Schema::create('uyt_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->longText('content')->nullable();
            $table->string('media')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
        });

        // 2. Tabel Resources / Dokumen UYT (Presentasi / Dokumen Download)
        Schema::create('uyt_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('dokumen'); // dokumen, presentasi, panduan
            $table->string('file_path');
            $table->text('description')->nullable();
            $table->integer('order_num')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 3. Tabel Fasilitator UYT
        Schema::create('uyt_facilitators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->nullable();
            $table->string('photo')->nullable();
            $table->text('testimony')->nullable();
            $table->string('location')->nullable();
            $table->integer('order_num')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 4. Tabel Cerita Pengguna / Cerita UYT (Internal submission)
        Schema::create('uyt_stories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('title');
            $table->longText('story');
            $table->string('media')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        // 5. Tabel Pendaftaran Workshop / Kemitraan UYT (Internal submission)
        Schema::create('uyt_workshop_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('organization_name');
            $table->string('organization_type')->nullable(); // Gereja, Komunitas, Sekolah, Yayasan, Individu
            $table->string('city')->nullable();
            $table->string('workshop_type')->nullable(); // Dasar, Lanjutan, Fasilitator, Kemitraan
            $table->integer('estimated_participants')->nullable();
            $table->date('preferred_date')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending, approved, contact_made, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uyt_workshop_registrations');
        Schema::dropIfExists('uyt_stories');
        Schema::dropIfExists('uyt_facilitators');
        Schema::dropIfExists('uyt_resources');
        Schema::dropIfExists('uyt_contents');
    }
};
