<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->string('name');
            $table->enum('type', ['content', 'metadata', 'featured'])->default('content');
            $table->tinyInteger('deleteable')->default(0);
            $table->tinyInteger('editable')->default(0);
            $table->tinyInteger('field_title')->default(0);
            $table->tinyInteger('field_subtitle')->default(0);
            $table->tinyInteger('field_description')->default(0);
            $table->tinyInteger('field_image_1')->default(0);
            $table->tinyInteger('field_image_2')->default(0);
            $table->tinyInteger('field_video_1')->default(0);
            $table->tinyInteger('field_sliders')->default(0);
            $table->tinyInteger('field_cta')->default(0);
            $table->string('featured_module')->nullable();
            $table->string('featured_module_action')->nullable();
            $table->text('other_field')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('sections');
    }
}
