<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_proposal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('mailing_number')->nullable()->unique();
            $table->string('title_cooperation');
            $table->mediumInteger('type_of_cooperation_one_derivative_id')->nullable();
            $table->mediumInteger('type_of_cooperation_two_derivative_id')->nullable();
            $table->integer('agencies_id');
            $table->tinyInteger('countries_id');
            $table->mediumInteger('province_id')->nullable();
            $table->integer('regency_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('agency_name');
            $table->text('address');
            $table->double('latitude');
            $table->double('longitude');
            // $table->string('nominal')->nullable();
            // $table->text('purpose_objectives');
            $table->text('background');
            $table->tinyInteger('status_proposal');
            $table->tinyInteger('status_disposition');
            $table->tinyInteger('time_period');
            $table->string('agency_profile');
            $table->string('proposal');
            $table->tinyInteger('status_barcode')->default(0);
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
        Schema::dropIfExists('submission_proposal');
    }
}
