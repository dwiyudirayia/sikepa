<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityDocumentationExtensionGuest extends Model
{
    protected $table = 'monitoring_activity_documentation_extension_guest';
    protected $fillable = ['monitoring_activity_extension_guest_id','file'];
}
