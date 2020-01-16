<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMOU extends Model
{
    protected $table = 'report_mou';
    protected $fillable = ['created_by', 'updated_by', 'submission_proposal_id', 'report'];
}
