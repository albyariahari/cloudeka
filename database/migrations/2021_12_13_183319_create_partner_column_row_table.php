<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerColumnRowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_column_row', function (Blueprint $table) {
			$table->unsignedBigInteger('column_id');
			$table->unsignedBigInteger('row_id');
			$table->text('description')->nullable();
			$table->index(['column_id', 'row_id']);
			
			$table->foreign('column_id')->references('id')->on('partner_columns')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('row_id')->references('id')->on('partner_rows')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_column_row');
    }
}
