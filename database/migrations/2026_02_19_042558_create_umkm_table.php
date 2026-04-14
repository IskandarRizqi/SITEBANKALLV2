<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('lokasi');
            $table->text('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->text('tipe_discount')->nullable();
            $table->text('nilai_discount')->nullable();
            $table->text('rating')->nullable();
            $table->json('layanan')->nullable();
            $table->json('gambar')->nullable();
            $table->text('thumbnail')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->tinyInteger('type_pilihan')
                ->default(0)
                ->comment('0 = Rekomendasi, 1 = Terlaris, 2 = Top Rating');

            $table->text('jarak')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
