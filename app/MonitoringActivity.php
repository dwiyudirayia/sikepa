<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivity extends Model
{
    protected $table = 'monitoring_activity';
    protected $fillable = ['submission_proposal_id','budget','target','reach','problem','problem_solving','report'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposal::class);
    }
    public function documentation() {
        return $this->hasMany(MonitoringActivityDocumentation::class);
    }
    public function result() {
        return $this->belongsTo(MonitoringActivityResult::class);
    }
}
