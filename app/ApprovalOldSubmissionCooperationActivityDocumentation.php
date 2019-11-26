<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalOldSubmissionCooperationActivityDocumentation extends Model
{
    protected $table = 'approval_old_submission_cooperation_activity_documentation';
    protected $fillable = ['created_by','approval_old_submission_cooperation_activity_id','name'];

}
