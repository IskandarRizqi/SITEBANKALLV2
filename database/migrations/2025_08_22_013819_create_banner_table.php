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
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(0)->comment('0:Top; 1:bottom; 2:lainnya');
            $table->integer('tampil')->default(1)->comment('0:Hide; 1:Show');
            $table->datetime('tampil_start');
            $table->datetime('tampil_end');
            $table->json('tag')->nullable();
            $table->text('name')->nullable();
            $table->text('url');
            $table->text('url_mobile')->nullable();
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
        Schema::dropIfExists('banner');
    }
};
