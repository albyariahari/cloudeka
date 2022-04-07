<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('slug', 45);
            $table->string('excerpt_id', 255);
            $table->string('excerpt_en', 255);
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('monthly_price')->default(0);
            $table->unsignedBigInteger('hourly_price')->default(0);
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('package_items');
    }
}
