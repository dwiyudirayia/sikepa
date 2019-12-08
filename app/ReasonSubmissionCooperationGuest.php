<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReasonSubmissionCooperationGuest extends Model
{
    protected $table = 'reason_submission_cooperation_guest';
    protected $fillable = ['created_by','submission_proposal_guest_id','reason','approval'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
