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
        if (!Schema::hasTable('counter_rate')) {
            Schema::create('counter_rate', function (Blueprint $table) {
                $table->id();
                $table->string('nama')->nullable();
                $table->tinyInteger('type')->nullable();
                // 1 = kredit
                // 2 = tabungan
                // 3 = deposito

                $table->text('image')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_rate');
    }
};
