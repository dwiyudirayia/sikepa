<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityDocumentation extends Model
{
    protected $table = 'monitoring_activity_documentation';
    protected $fillable = ['monitoring_activity_id','file'];
}
