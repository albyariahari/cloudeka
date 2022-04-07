<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderItemTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_item_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slider_item_id');
            $table->unique(['slider_item_id', 'lang']);
            $table->foreign('slider_item_id')->references('id')->on('slider_items')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('cta')->nullable();
            $table->string('cta_label')->nullable();
            $table->unsignedBigInteger('author_id')->default(1);
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
        Schema::dropIfExists('slider_item_translations');
    }
}
