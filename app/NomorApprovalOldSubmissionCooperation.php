<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorApprovalOldSubmissionCooperation extends Model
{
    protected $table = 'nomor_approval_old_submission_cooperation';
    protected $fillable = ['created_by','approval_old_submission_cooperation_id','nomor'];
}
