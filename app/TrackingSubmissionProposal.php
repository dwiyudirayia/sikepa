<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingSubmissionProposal extends Model
{
    protected $table = 'tracking_submission_proposal';
    protected $fillable = ['submission_proposal_id','role_id','status','approval','reason'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposal::class);
    }
}
