<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorApprovalSubmissionCooperation extends Model
{
    protected $table = 'nomor_approval_submission_cooperation';
    protected $fillable = ['created_by','submission_proposal_id','nomor'];

}
