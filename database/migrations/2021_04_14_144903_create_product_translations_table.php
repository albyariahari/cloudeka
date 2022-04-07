<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id();

            // Foreign key to the main model
            $table->unsignedBigInteger('product_id');
            $table->unique(['product_id', 'lang']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Actual fields you want to translate
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->string('excerpt');
            $table->string('images')->nullable();
            $table->string('logo_1')->nullable();
            $table->string('logo_2')->nullable();
            $table->longText('description');
            $table->longText('partner_description');
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
        Schema::dropIfExists('product_translations');
    }
}
