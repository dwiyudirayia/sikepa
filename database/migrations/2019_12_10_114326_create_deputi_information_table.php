<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeputiInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deputi_information', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title');
            $table->string('url');
            $table->string('photo_contact')->nullable();
            $table->text('text_contact')->nullable();
            $table->string('photo_information')->nullable();
            $table->longText('full_text_information')->nullable();
            $table->text('text_information')->nullable();
            $table->string('photo_requirement')->nullable();
            $table->text('text_requirement')->nullable();
            $table->tinyInteger('type_video')->nullable();
            $table->string('photo_video')->nullable();
            $table->text('text_video')->nullable();
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
        Schema::dropIfExists('deputi_information');
    }
}
