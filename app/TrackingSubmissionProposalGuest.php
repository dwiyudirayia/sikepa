<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingSubmissionProposalGuest extends Model
{
    protected $table = 'tracking_submission_proposal_guest';
    protected $fillable = ['submission_proposal_guest_id', 'biro_perencanaan_dan_data','bagian_kerja_sama','bagian_ortala','sesmen','menteri','hukum','sesmen_final','menteri_final','bagian_kerja_sama_final'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposalGuest::class);
    }
}
