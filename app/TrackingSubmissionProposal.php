<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingSubmissionProposal extends Model
{
    protected $table = 'tracking_submission_proposal';
    protected $fillable = ['deputi_bidang_partisipasi_masyarakat','deputi_bidang_kesetaraan_gender','deputi_bidang_perlindungan_anak','deputi_bidang_perlindungan_hak_perempuan','deputi_bidang_tumbuh_kembang_anak','biro_perencanaan_dan_data','bagian_kerja_sama','bagian_ortala','sesmen','menteri','hukum','sesmen_final','menteri_final','bagian_kerja_sama_final'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposal::class);
    }
}
