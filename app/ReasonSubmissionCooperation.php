<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReasonSubmissionCooperation extends Model
{
    protected $table = 'reason_submission_cooperation';
    protected $fillable = ['created_by', 'submission_proposal_id', 'reason', 'approval'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
