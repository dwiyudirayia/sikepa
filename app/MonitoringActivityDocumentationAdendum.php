<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityDocumentationAdendum extends Model
{
    protected $table = 'monitoring_activity_documentation_adendum';
    protected $fillable = ['monitoring_activity_adendum_id','file'];
}
