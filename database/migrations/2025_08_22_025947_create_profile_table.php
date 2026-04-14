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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(0)->comment('0:Profile; 1:Sejarah; 2:Pengurus; 3:Struktur Organisasi; 4:Lainnya');
            $table->integer('urutan')->default(0);
            $table->json('tag')->nullable();
            $table->text('kategori')->nullable();
            $table->text('title')->unique();
            $table->text('slug')->unique();
            $table->text('banner')->nullable();
            $table->text('thumbnail')->nullable();
            $table->longText('content')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
