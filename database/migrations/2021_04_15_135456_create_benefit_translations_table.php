<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefit_id');
            $table->unique(['benefit_id', 'lang']);
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade');
            $table->string('title');
            $table->longText('description');
            $table->text('icon', 45)->nullable();
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
        Schema::dropIfExists('benefit_translations');
    }
}
