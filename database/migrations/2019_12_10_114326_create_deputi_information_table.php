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
            $table->bigIncrements('id');
            $table->string('photo_contact');
            $table->longText('text_contact');
            $table->string('photo_information');
            $table->longText('text_information');
            $table->string('photo_requirement');
            $table->longText('text_requirement');
            $table->string('photo_video');
            $table->longText('text_video');
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
