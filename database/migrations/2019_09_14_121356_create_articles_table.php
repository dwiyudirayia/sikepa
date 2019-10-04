<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->mediumInteger('section_id');
            $table->mediumInteger('category_id');
            $table->string('title');
            $table->text('short_content');
            $table->string('url');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_key')->nullable();
            $table->text('seo_meta_desc')->nullable();
            $table->boolean('publish')->nullable();
            $table->boolean('approved')->nullable();
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
        Schema::dropIfExists('article');
    }
}
