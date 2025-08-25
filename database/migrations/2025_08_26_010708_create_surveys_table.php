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
       Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // nama pengunjung
            $table->string('email')->nullable(); // optional
            $table->tinyInteger('rating'); // nilai kepuasan (1-5)
            $table->text('feedback')->nullable(); // komentar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
