<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKryptonit3CounterPageTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('kryptonit3_counter_page')) {
            Schema::create('kryptonit3_counter_page', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('page')->unique();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('kryptonit3_counter_page');
    }
}