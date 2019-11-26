<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionProposalOld extends Model
{
    protected $table = 'submission_proposal_old';
    protected $fillable = ['title_cooperation','agency_name','year','status'];
}
