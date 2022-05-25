<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoryTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category_translations', function (Blueprint $table) {
            $table->id();

            // Foreign key to the main model
            $table->unsignedBigInteger('news_category_id');
            $table->unique(['news_category_id', 'lang']);
            $table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');

            $table->string('title');
            $table->string('slug');
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
        Schema::dropIfExists('news_category_translations');
    }
}
