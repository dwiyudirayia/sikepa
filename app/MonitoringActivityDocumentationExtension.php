<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityDocumentationExtension extends Model
{
    protected $table = 'monitoring_activity_documentation_extension';
    protected $fillable = ['monitoring_activity_extension_id','file'];
}
