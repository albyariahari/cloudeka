<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitUpgradeBenefitLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_upgrade_benefit_level', function (Blueprint $table) {
			$table->unsignedBigInteger('upgrade_id');
			$table->unsignedBigInteger('level_id');
			$table->index(['upgrade_id', 'level_id']);
			
			$table->foreign('upgrade_id')->references('id')->on('benefit_upgrades')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('level_id')->references('id')->on('benefit_levels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefit_upgrade_benefit_level');
    }
}
