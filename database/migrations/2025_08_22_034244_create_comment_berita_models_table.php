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
        Schema::create('comment_berita_models', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('berita_id');
            $table->string('email');
            $table->string('nama');
            $table->string('no_hp');
            $table->text('komentar');
            $table->tinyInteger('status')->comment('0 = pending, 1 = approved, 2 = rejected');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_berita_models');
    }
};
