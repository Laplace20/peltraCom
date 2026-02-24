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
        Schema::create('legalities', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama Dokumen
            $table->string('file_path'); // Lokasi file PDF
            $table->string('size')->nullable(); // Ukuran file (otomatis)
            $table->boolean('is_visible')->default(true); // Status tampil/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legalities');
    }
};
