<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicContentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_content_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dynamic_content_id');
            $table->unique(['dynamic_content_id', 'lang']);
            $table->foreign('dynamic_content_id')->references('id')->on('dynamic_contents')->onDelete('cascade');
            $table->unsignedBigInteger('author_id')->default(1);
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->text('image_1')->nullable();
            $table->text('image_2')->nullable();
            $table->text('video_1')->nullable();
            $table->text('sliders')->nullable();
            $table->string('cta')->nullable()->default(null);
            $table->text('others')->nullable();
            $table->string('lang', 2)->index();
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
        Schema::dropIfExists('dynamic_content_translations');
    }
}
