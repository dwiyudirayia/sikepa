<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawFileSubmissionProposalGuest extends Model
{
    protected $table = 'law_file_submission_proposal_guest';
    protected $fillable = ['created_by','submission_proposal_guest_id','notulen','draft'];
}
