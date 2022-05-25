<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solution_id');
            $table->unique(['solution_id', 'lang']);
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
            $table->string('title', 45);
            $table->string('slug', 45);
            $table->string('subtitle');
            $table->string('images')->nullable();
            $table->string('logo_1')->nullable();
            $table->string('logo_2')->nullable();
            $table->text('excerpt');
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
        Schema::dropIfExists('solution_translations');
    }
}
