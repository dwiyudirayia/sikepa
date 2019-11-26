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
            $table->tinyInteger('deputi_bidang_partisipasi_masyarakat')->nullable();
            $table->tinyInteger('deputi_bidang_kesetaraan_gender')->nullable();
            $table->tinyInteger('deputi_bidang_perlindungan_anak')->nullable();
            $table->tinyInteger('deputi_bidang_perlindungan_hak_perempuan')->nullable();
            $table->tinyInteger('deputi_bidang_tumbuh_kembang_anak')->nullable();
            $table->tinyInteger('biro_perencanaan_dan_data')->nullable();
            $table->tinyInteger('bagian_kerja_sama')->nullable();
            $table->tinyInteger('bagian_ortala')->nullable();
            $table->tinyInteger('sesmen')->nullable();
            $table->tinyInteger('menteri')->nullable();
            $table->tinyInteger('hukum')->nullable();
            $table->tinyInteger('sesmen_final')->nullable();
            $table->tinyInteger('menteri_final')->nullable();
            $table->tinyInteger('bagian_kerja_sama_final')->nullable();
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
