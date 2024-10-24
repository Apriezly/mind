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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->string('kegiatan');
            $table->string('deskripsi');
            $table->time('waktu'); //untuk yang di pengingat (waktu mengingatkannya)
            $table->timestamp('expiration_date'); //tanggal berakhirnya dokumen
            $table->string('image');
            $table->string('tipe'); //ini yang di pengingat, email dan WA
            $table->string('ulangi'); //ini nanti yang diulangi per hari/minggu/lainnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
