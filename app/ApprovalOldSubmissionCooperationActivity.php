<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalOldSubmissionCooperationActivity extends Model
{
    protected $table = 'approval_old_submission_cooperation_activity';
    protected $fillable = ['created_by','approval_old_submission_cooperation_id','implementation_of_activity_reports','activity_result','year','budget','target','achievements', 'the_problem', 'problem_solving_efforts', 'field_trip_information','evaluation','recomendation'];

    public function documentation()
    {
        return $this->hasMany(ApprovalOldSubmissionCooperationActivityDocumentation::class);
    }
}
