<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinProgramSolutionInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_program_solution_interest', function (Blueprint $table) {
			$table->unsignedBigInteger('join_program_id');
			$table->unsignedBigInteger('solution_interest_id');
			$table->index(['join_program_id', 'solution_interest_id'], 'jp_si_jp_id_si_id_index');
			
			$table->foreign('join_program_id')->references('id')->on('join_programs')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('solution_interest_id')->references('id')->on('solution_interests')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_program_solution_interest');
    }
}
