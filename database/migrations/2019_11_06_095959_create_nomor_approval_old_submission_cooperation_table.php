<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomorApprovalOldSubmissionCooperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor_approval_old_submission_cooperation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by');
            $table->bigInteger('approval_old_submission_cooperation_id');
            $table->string('nomor');
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
        Schema::dropIfExists('nomor_approval_old_submission_cooperation');
    }
}
