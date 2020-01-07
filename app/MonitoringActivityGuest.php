<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityGuest extends Model
{
    protected $table = 'monitoring_activity_guest';
    protected $fillable = [
        'submission_proposal_guest_id',
        'title_activity',
        'implementation_date',
        'location',
        'description_activities',
        'result_status',
    ];

    public function proposal() {
        return $this->belongsTo(SubmissionProposalGuest::class);
    }
    public function documentation() {
        return $this->hasMany(MonitoringActivityDocumentationGuest::class);
    }
    public function result() {
        return $this->hasOne(MonitoringActivityResultGuest::class);
    }
}
