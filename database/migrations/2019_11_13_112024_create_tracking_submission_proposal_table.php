<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingSubmissionProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_submission_proposal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('submission_proposal_id');
            $table->integer('role_id');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('approval')->nullable();
            $table->text('reason');
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
        Schema::dropIfExists('tracking_submission_proposal');
    }
}
