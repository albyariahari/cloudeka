<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorHasCalComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculator_has_cal_components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->foreign('calculator_id')->references('id')->on('calculators')->onDelete('cascade');
            $table->unsignedBigInteger('calculator_component_id');
            $table->foreign('calculator_component_id')->references('id')->on('calculator_components')->onDelete('cascade');
            $table->json('price')->nullable();
            $table->json('other_rules')->nullable();
            $table->json('pricing_impact_rules')->nullable();
            $table->integer('rule_min_value')->nullable();
            $table->integer('rule_max_value')->nullable();
            $table->tinyInteger('rule_must_be_even');
            $table->tinyInteger('rule_editable');
            $table->tinyInteger('visible')->default(1);
            $table->string('display_mode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculator_has_cal_components');
    }
}
