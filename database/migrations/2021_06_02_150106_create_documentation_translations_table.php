<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('documentation_translations')) {
            Schema::create('documentation_translations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('documentation_id');
                $table->string('lang', 2)->index();
                $table->string('title', 255);
                $table->text('description');
                $table->string('meta_title', 255)->nullable();
                $table->string('meta_keywords', 255)->nullable();
                $table->text('meta_description')->nullable();
                $table->unique(['documentation_id', 'lang']);
                $table->foreign('documentation_id')->references('id')->on('documentations')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentation_translations');
    }
}
