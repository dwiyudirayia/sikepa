<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_extension', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('extension_id');
            $table->integer('role_id');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('approval')->nullable();
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('tracking_extension');
    }
}
