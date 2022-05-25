<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();

            // Foreign key to the main model
            $table->unsignedBigInteger('news_id');
            $table->unique(['news_id', 'lang']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('summary')->nullable();
            $table->string('outer_thumbnail')->nullable();
            $table->string('inner_thumbnail')->nullable();
            $table->string('meta_title', 255);
            $table->string('meta_keyword', 255);
            $table->text('meta_description');
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
        Schema::dropIfExists('news_translations');
    }
}
