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
        Schema::create('master_pengajuan_tabungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->decimal('bunga', 5, 2)->nullable();
            $table->integer('min')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pengajuan_tabungan');
    }
};
