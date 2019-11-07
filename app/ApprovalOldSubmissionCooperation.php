<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalOldSubmissionCooperation extends Model
{
    protected $table = 'approval_old_submission_cooperation';
    protected $fillable = ['created_by','title_of_cooperation','tanggal_ttd','background','end_date','status','description'];


}
