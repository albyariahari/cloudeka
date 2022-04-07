<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_types', function (Blueprint $table) {
            $table->id();
			$table->string('name', 50);
			$table->string('code', 50);
			$table->boolean('is_active')->default(true);
			$table->integer('order')->default(0);
			$table->unsignedBigInteger('author_id');
			$table->unsignedBigInteger('update_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->index(['name', 'code']);
			
            $table->foreign('author_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('update_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefit_types');
    }
}
