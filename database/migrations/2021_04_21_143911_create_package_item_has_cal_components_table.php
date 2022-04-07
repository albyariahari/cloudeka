<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageItemHasCalComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_item_has_cal_components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_item_id');
            $table->foreign('package_item_id')->references('id')->on('package_items')->onDelete('cascade');
            $table->unsignedBigInteger('calculator_component_id');
            $table->foreign('calculator_component_id')->references('id')->on('calculator_components')->onDelete('cascade');
            $table->integer('value')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_item_has_cal_components');
    }
}
