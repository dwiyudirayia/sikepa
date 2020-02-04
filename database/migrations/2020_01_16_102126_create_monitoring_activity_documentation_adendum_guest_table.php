<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringActivityDocumentationAdendumGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_activity_documentation_adendum_guest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('monitoring_activity_adendum_guest_id');
            $table->string('file');
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
        Schema::dropIfExists('monitoring_activity_documentation_adendum_guest');
    }
}
