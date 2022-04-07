<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_settings', function (Blueprint $table) {
            $table->id();
            $table->morphs('contentable');
            $table->tinyInteger('field_title')->default(0);
            $table->string('field_title_label', 45)->default('Title')->nullable();
            $table->tinyInteger('field_subtitle')->default(0);
            $table->string('field_subtitle_label')->default('Subtitle')->nullable();
            $table->tinyInteger('field_excerpt')->default(0);
            $table->string('field_excerpt_label')->default('Excerpt')->nullable();
            $table->tinyInteger('field_description')->default(0);
            $table->string('field_description_label')->nullable();
            $table->tinyInteger('field_image_1')->default(0);
            $table->string('field_image_1_label')->default('Image 1')->nullable();
            $table->tinyInteger('field_image_2')->default(0);
            $table->string('field_image_2_label')->default('Image 2')->nullable();
            $table->tinyInteger('field_vide_1')->default(0);
            $table->string('field_vide_1_label')->default('Video')->nullable();
            $table->tinyInteger('field_sliders')->default(0);
            $table->string('field_sliders_label')->default('Sliders')->nullable();
            $table->tinyInteger('field_cta')->default(0);
            $table->string('field_cta_label')->default('Button')->nullable();
            $table->text('other_field')->nullable();
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
        Schema::dropIfExists('content_settings');
    }
}
