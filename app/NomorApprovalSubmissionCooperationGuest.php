<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorApprovalSubmissionCooperationGuest extends Model
{
    protected $table = 'nomor_approval_submission_cooperation_guest';
    protected $fillable = ['created_by','submission_proposal_guest_id','nomor'];
}
