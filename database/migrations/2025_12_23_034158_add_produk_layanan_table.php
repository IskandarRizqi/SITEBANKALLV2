<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produk_layanan', function (Blueprint $table) {
            $table->text('brosur')->nullable();
            $table->text('riplay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk_layanan', function (Blueprint $table) {
            //
        });
    }
};
