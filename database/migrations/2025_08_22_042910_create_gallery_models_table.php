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
        Schema::create('gallery_models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1: active, 0: inactive');
            $table->bigInteger('created_by')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('meta_opengraph_title')->nullable()->comment('Open Graph title for social media sharing');
            $table->string('meta_opengraph_description')->nullable()->comment('Open Graph description for social media sharing');
            $table->string('meta_opengraph_image')->nullable()->comment('Open Graph image for social media sharing');
            $table->string('meta_twitter_card')->default('summary_large_image')->comment('Twitter card type for social media sharing');
            $table->string('meta_twitter_title')->nullable()->comment('Twitter title for social media sharing');
            $table->string('meta_twitter_description')->nullable()->comment('Twitter description for social media sharing');
            $table->string('meta_twitter_image')->nullable()->comment('Twitter image for social media sharing');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_models');
    }
};
