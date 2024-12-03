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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kategori_id')->nullable();
            $table->string('kegiatan');
            $table->string('deskripsi');
            $table->time('waktu')->nullable(); 
            $table->timestamp('expiration_date'); 
            $table->string('image')->nullable();
            $table->string('imageasli')->nullable();
            $table->string('tipe')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
