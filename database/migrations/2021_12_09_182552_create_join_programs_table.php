<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_programs', function (Blueprint $table) {
            $table->id();
			$table->string('name', 50);
			$table->string('email', 255);
			$table->string('job_title', 255)->nullable();
			$table->text('job_function')->nullable();
			$table->string('phone', 30);
			$table->unsignedBigInteger('partnership_types_id');
			$table->unsignedBigInteger('solution_interests_id')->nullable();
			$table->dateTime('sent_at')->nullable();
			$table->softDeletes();
			
            $table->foreign('partnership_types_id')->references('id')->on('partnership_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_interests_id')->references('id')->on('solution_interests')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_programs');
    }
}
