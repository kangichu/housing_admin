<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('referral_code')->unique();
            $table->text('post');
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('status');
            $table->string('platform');
            $table->string('tags')->nullable();
            $table->timestamp('schedule')->nullable();
            $table->boolean('repeat')->default(false);
            $table->string('repeat_every')->nullable();
            $table->timestamp('repeat_ends')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_media');
    }
}