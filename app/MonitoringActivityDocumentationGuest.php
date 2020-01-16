<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityDocumentationGuest extends Model
{
    protected $table = 'monitoring_activity_documentation_guest';
    protected $fillable = ['monitoring_activity_guest_id','file'];
}
