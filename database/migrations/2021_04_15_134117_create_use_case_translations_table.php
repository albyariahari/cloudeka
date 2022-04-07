<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseCaseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_case_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('use_case_id');
            $table->unique(['use_case_id', 'lang']);
            $table->foreign('use_case_id')->references('id')->on('use_cases')->onDelete('cascade');
            $table->text('description');
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
        Schema::dropIfExists('use_case_translations');
    }
}
