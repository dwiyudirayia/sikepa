<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingSubmissionProposalGuest extends Model
{
    protected $table = 'tracking_submission_proposal_guest';
    protected $fillable = ['submission_proposal_guest_id'.'role_id'.'status'.'approval'.'reason'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposalGuest::class);
    }
}
