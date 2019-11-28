<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionProposalGuest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_proposal_guest', function (Blueprint $table) {
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('mailing_number')->unique();
            $table->string('title_cooperation');
            $table->mediumInteger('type_of_cooperation_id');
            $table->mediumInteger('type_of_cooperation_one_derivative_id')->nullable();
            $table->mediumInteger('type_of_cooperation_two_derivative_id')->nullable();
            $table->mediumInteger('substance_cooperation_id');
            $table->mediumInteger('cooperastion_target_id');
            $table->mediumInteger('target_of_cooperation_id');
            $table->integer('agencies_id');
            $table->text('countries_id');
            $table->mediumInteger('province_id')->nullable();
            $table->integer('regency_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('nominal')->nullable();
            $table->string('name');
            $table->string('ktp');
            $table->string('npwp');
            $table->string('siup');
            $table->string('no_telp');
            $table->string('email');
            $table->text('purpose_objectives');
            $table->text('background');
            $table->tinyInteger('status_proposal');
            $table->tinyInteger('status_disposition');
            $table->tinyInteger('time_period');
            // $table->date('time_period_of');
            // $table->date('time_period_to');
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
        Schema::dropIfExists('submission_proposal_guest');
    }
}
