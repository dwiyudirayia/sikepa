<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportExtensionGuest extends Model
{
    protected $table = 'report_extension_guest';
    protected $fillable = ['created_by', 'updated_by', 'extension_guest_id', 'report'];
}
