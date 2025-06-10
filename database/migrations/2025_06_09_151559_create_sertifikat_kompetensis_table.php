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
        Schema::create('sertifikat_kompetensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 250);
            $table->string('penerbit', 250);
            $table->string('bidang', 250);
            $table->year('tahun_terbit');
            $table->year('tahun_kadaluarsa')->nullable();
            $table->string('nomor', 100)->nullable();
            $table->string('file', 250)->nullable();
            $table->string('keterangan', 500)->nullable();
            $table->tinyInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat_kompetensis');
    }
};
