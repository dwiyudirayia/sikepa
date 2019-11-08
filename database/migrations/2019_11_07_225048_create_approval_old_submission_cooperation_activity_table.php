<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalOldSubmissionCooperationActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_old_submission_cooperation_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by')->nullable();
            $table->bigInteger('approval_old_submission_cooperation_id');
            $table->string('implementation_of_activity_reports')->nullable();
            $table->string('activity_result')->nullable();
            $table->string('year')->nullable();
            $table->string('budget')->nullable();
            $table->text('target')->nullable();
            $table->text('achievements')->nullable();
            $table->text('field_trip_information')->nullable();
            $table->string('evaluation')->nullable();
            $table->string('recomendation')->nullable();
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
        Schema::dropIfExists('approval_old_submission_cooperation_activity');
    }
}
