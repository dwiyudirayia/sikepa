<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('submission_proposal_id');
            $table->integer('budget')->nullable();
            $table->text('target')->nullable();
            $table->text('capaian')->nullable();
            $table->text('problem')->nullable();
            $table->text('problem_solving')->nullable();
            $table->text('report')->nullable();
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
        Schema::dropIfExists('monitoring_activity');
    }
}
