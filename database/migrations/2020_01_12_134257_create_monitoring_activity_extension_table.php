<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringActivityExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_activity_extension', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('extension_id');
            $table->string('title_activity')->nullable();
            $table->date('implementation_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description_activities')->nullable();
            // $table->text('problem_solving')->nullable();
            // $table->text('report')->nullable();
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
        Schema::dropIfExists('monitoring_activity_extension');
    }
}
