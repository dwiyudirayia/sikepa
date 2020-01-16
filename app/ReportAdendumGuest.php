<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAdendumGuest extends Model
{
    protected $table = 'report_adendum_guest';
    protected $fillable = ['created_by', 'updated_by', 'adendum_guest_id', 'report'];
}
