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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->nullable()->constrained('jenis')->cascadeOnUpdate()->onDelete('restrict');
            $table->foreignId('kategori_id')->nullable()->constrained('kategori')->cascadeOnUpdate()->onDelete('restrict');
            $table->string('nomor_surat');
            $table->string('nama_surat');
            $table->date('tanggal_surat');
            $table->string('isi_surat');
            $table->string('file_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
