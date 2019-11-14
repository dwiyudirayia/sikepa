<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalOldSubmissionCooperation extends Model
{
    protected $table = 'approval_old_submission_cooperation';
    protected $fillable = ['created_by','title_of_cooperation','tanggal_ttd','background','end_date','status','description'];

    public function activities() {
        return $this->hasMany(ApprovalOldSubmissionCooperationActivity::class, 'approval_old_submission_cooperation_id');
    }
    public function nomor() {
        return $this->hasMany(NomorApprovalOldSubmissionCooperation::class);
    }
    public function parties() {
        return $this->hasMany(ThePartiesApprovalOldSubmissionCooperation::class);
    }
}
