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
        Schema::create('multibanner_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_id');
            $table->text('url');
            $table->integer('active')->default(1);
            $table->integer('urutan')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multibanner_pages');
    }
};
