<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionHasUseCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_has_use_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solution_id');
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
            $table->unsignedBigInteger('use_case_id');
            $table->foreign('use_case_id')->references('id')->on('use_cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solution_has_use_cases');
    }
}
