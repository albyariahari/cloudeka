<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKryptonit3CounterPageVisitorTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('kryptonit3_counter_page_visitor')) {
            Schema::create('kryptonit3_counter_page_visitor', function (Blueprint $table) {
                $table->bigInteger('page_id')->unsigned()->index();
                $table->bigInteger('visitor_id')->unsigned()->index();
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                
                $table->foreign('page_id')->references('id')->on('kryptonit3_counter_page')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('visitor_id')->references('id')->on('kryptonit3_counter_visitor')->onUpdate('cascade')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('kryptonit3_counter_page_visitor');
    }
}