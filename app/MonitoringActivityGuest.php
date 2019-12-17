<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityGuest extends Model
{
    protected $table = 'monitoring_activity_guest';
    protected $fillable = ['submission_proposal_guest_id','budget','target','reach','problem','problem_solving','report'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposalGuest::class);
    }
    public function documentation() {
        return $this->hasMany(MonitoringActivityDocumentationGuest::class);
    }
    public function result() {
        return $this->belongsTo(MonitoringActivityResultGuest::class);
    }
}
