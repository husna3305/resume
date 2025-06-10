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
        Schema::create('pengabdians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengabdian', 300);
            $table->string('lembaga', 300)->nullable()->comment('Nama lembaga atau institusi tempat pengabdian');
            $table->year('tahun')->comment('Tahun pelaksanaan pengabdian');
            $table->text('deskripsi')->nullable()->comment('Deskripsi atau ringkasan pengabdian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengabdians');
    }
};
