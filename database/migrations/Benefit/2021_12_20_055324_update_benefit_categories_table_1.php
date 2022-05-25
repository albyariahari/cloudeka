<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBenefitCategoriesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benefit_categories', function (Blueprint $table) {
			$table->unsignedBigInteger('type_id')->nullable()->after('id');
			
            $table->foreign('type_id')->references('id')->on('benefit_types')->onUpdate('cascade')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benefit_categories', function (Blueprint $table) {
			$table->dropForeign('benefit_categories_type_id_foreign');
			$table->dropColumn('type_id');
		});
    }
}
