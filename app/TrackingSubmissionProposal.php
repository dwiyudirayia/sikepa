<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingSubmissionProposal extends Model
{
    protected $table = 'tracking_submission_proposal';
    protected $fillable = ['submission_proposal_id','bagian_kerja_sama','bagian_ortala','sesmen','menteri','hukum','sesmen_final','menteri_final','bagian_kerja_sama_final'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposal::class);
    }
}
