<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinProgramPartnershipTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_program_partnership_type', function (Blueprint $table) {
			$table->unsignedBigInteger('join_program_id');
			$table->unsignedBigInteger('partnership_type_id');
			$table->index(['join_program_id', 'partnership_type_id'], 'jp_pt_jp_id_pt_id_index');
			
			$table->foreign('join_program_id')->references('id')->on('join_programs')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('partnership_type_id')->references('id')->on('partnership_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_program_partnership_type');
    }
}
