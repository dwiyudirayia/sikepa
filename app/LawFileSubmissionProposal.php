<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawFileSubmissionProposal extends Model
{
    protected $table = 'law_file_submission_proposal';
    protected $fillable = ['created_by','submission_proposal_id','notulen','draft'];
}
