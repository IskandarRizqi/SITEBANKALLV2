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
        Schema::create('our_contact', function (Blueprint $table) {
            $table->id();
            $table->integer('category')->comment('0:Contact; 1:Sosmed;');
            $table->integer('type')->comment('0:Email; 1:Phone; 2:Mobile; 3:Whatsapp; 4:Facebook; 5:X; 6:Instagram;');
            $table->text('title');
            $table->text('url');
            $table->text('icon');
            $table->integer('urutan')->default(0);
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
        Schema::dropIfExists('our_contact');
    }
};
