<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAdendum extends Model
{
    protected $table = 'report_adendum';
    protected $fillable = ['created_by', 'updated_by', 'adendum_id', 'report'];
}
