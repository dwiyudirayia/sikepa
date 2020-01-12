<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingAdendumGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_adendum_guest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('adendum_guest_id');
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
        Schema::dropIfExists('tracking_adendum_guest');
    }
}
