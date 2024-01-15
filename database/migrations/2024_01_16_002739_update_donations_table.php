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
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('nominal');

            $table->string('amount')->nullable()->after('message');
            $table->string('type_of_goods')->nullable()->after('amount');
            $table->string('media')->nullable()->after('type_of_goods');
            $table->tinyInteger('type')->nullable()->after('media')->comment('1=Transfer Bank, 2=Donasi Barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
