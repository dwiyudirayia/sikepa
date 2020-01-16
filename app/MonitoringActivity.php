<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivity extends Model
{
    protected $table = 'monitoring_activity';
    protected $fillable = [
        'submission_proposal_id',
        'title_activity',
        'implementation_date',
        'location',
        'description_activities',
        'result_status',
    ];

    public function proposal()
    {
        return $this->belongsTo(SubmissionProposal::class);
    }
    public function documentation()
    {
        return $this->hasMany(MonitoringActivityDocumentation::class);
    }
}
