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
        Schema::create('wbs', function (Blueprint $table) {
            $table->id();
            $table->string('bersedia_identitas');
            $table->string('nama_pelapor');
            $table->string('hp_pelapor');
            $table->string('kategori_pelanggaran');
            $table->string('nama_terlapor');
            $table->string('jabatan_terlapor');
            $table->string('lokasi');
            $table->dateTime('waktu'); 
            $table->string('deskripsi');
            $table->text('bukti')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wbs');
    }
};
