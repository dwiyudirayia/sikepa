<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalOldSubmissionCooperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_old_submission_cooperation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('title_of_cooperation');
            $table->date('tanggal_ttd');
            $table->text('background');
            $table->date('end_date');
            $table->tinyInteger('status');
            $table->text('description');
            $table->integer('role_id');
            $table->double('latitude');
            $table->double('longitude');
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
        Schema::dropIfExists('approval_old_submission_cooperation');
    }
}
