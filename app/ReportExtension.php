<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportExtension extends Model
{
    protected $table = 'report_extension';
    protected $fillable = ['created_by', 'updated_by', 'extension_id', 'report'];
}
