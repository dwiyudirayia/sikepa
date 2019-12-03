<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->mediumInteger('section_id');
            $table->mediumInteger('category_id');
            $table->string('title');
            $table->string('url');
            $table->text('short_content')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_key')->nullable();
            $table->text('seo_meta_desc')->nullable();
            $table->tinyInteger('publish');
            $table->tinyInteger('approved');
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
        Schema::dropIfExists('page');
    }
}
