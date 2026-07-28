<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produk_layanan', function (Blueprint $table) {
            $table->string('deskripsi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('produk_layanan', function (Blueprint $table) {
            $table->string('deskripsi')->nullable();
        });
    }
};
