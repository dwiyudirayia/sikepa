<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdendumProposalGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adendum_proposal_guest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('submission_proposal_guest_id');
            $table->string('mailing_number')->nullable()->unique();
            $table->string('title_cooperation');
            $table->mediumInteger('type_of_cooperation_one_derivative_id')->nullable();
            $table->mediumInteger('type_of_cooperation_two_derivative_id')->nullable();
            $table->integer('agencies_id');
            $table->tinyInteger('countries_id');
            $table->mediumInteger('province_id')->nullable();
            $table->integer('regency_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('name');
            $table->string('department')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('siup')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('agency_name');
            $table->text('address');
            $table->string('email');
            // $table->text('purpose_objectives');
            $table->text('background');
            $table->tinyInteger('status_proposal');
            $table->tinyInteger('status_disposition');
            $table->tinyInteger('time_period');
            $table->string('agency_profile')->nullable();
            $table->string('proposal')->nullable();
            $table->tinyInteger('status_barcode')->default(0);
            $table->date('expired_at');
            // $table->string('reject_dana')->nullable();
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
        Schema::dropIfExists('adendum_proposal_guest');
    }
}
