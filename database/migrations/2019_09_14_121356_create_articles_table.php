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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->mediumInteger('category_id');
            $table->string('title');
            $table->string('url');
            $table->longText('content');
            $table->text('seo_title');
            $table->text('seo_meta_key');
            $table->text('seo_meta_desc');
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
        Schema::dropIfExists('articles');
    }
}
