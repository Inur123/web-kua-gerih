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
        Schema::create('prosedurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained()->onDelete('cascade');
            $table->string('nama'); // nama prosedur
            $table->text('deskripsi')->nullable(); // deskripsi tambahan
            $table->string('link_download')->nullable(); // kalau ada file panduan/prosedur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prosedurs');
    }
};
