<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJoinProgramsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('join_programs', function (Blueprint $table) {
			$table->dropForeign('join_programs_partnership_types_id_foreign');
			$table->dropForeign('join_programs_solution_interests_id_foreign');
			$table->dropColumn('partnership_types_id');
			$table->dropColumn('solution_interests_id');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('join_programs', function (Blueprint $table) {
			$table->unsignedBigInteger('partnership_types_id');
			$table->unsignedBigInteger('solution_interests_id');
			
            $table->foreign('partnership_types_id')->references('id')->on('partnership_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_interests_id')->references('id')->on('solution_interests')->onUpdate('cascade')->onDelete('cascade');
		});
    }
}
