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
        Schema::create('publikasis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 200)->comment('Jenis publikasi, misalnya: Artikel, Buku, Jurnal, dll.');
            $table->string('judul', 300)->comment('Judul publikasi');
            $table->string('penerbit', 200)->comment('Penerbit publikasi, jika ada');
            $table->year('tahun');
            $table->string('path_file', 300)->nullable()->comment('Path file publikasi, jika ada');
            $table->text('deskripsi')->nullable()->comment('Deskripsi atau ringkasan publikasi');
            $table->string('url', 300)->nullable()->comment('URL publikasi, jika ada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasis');
    }
};
