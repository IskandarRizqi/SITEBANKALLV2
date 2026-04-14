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
        Schema::create('karir_models', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('kualifikasi');
            $table->string('lokasi');
            $table->tinyInteger('tipe_pekerjaan')->comment('1: Full-time, 2: Part-time, 3: Contract');
            $table->double('gaji_min')->default(0)->nullable();
            $table->double('gaji_max')->default(0)->nullable();
            $table->date('tanggal_posting')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->tinyInteger('status')->comment('1: active, 0: inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karir_models');
    }
};
