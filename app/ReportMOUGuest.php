<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMOUGuest extends Model
{
    protected $table = 'report_mou_guest';
    protected $fillable = ['created_by', 'updated_by', 'submission_proposal_guest_id', 'report'];
}
