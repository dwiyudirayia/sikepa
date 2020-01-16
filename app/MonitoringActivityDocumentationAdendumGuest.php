<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityDocumentationAdendumGuest extends Model
{
    protected $table = 'monitoring_activity_documentation_adendum_guest';
    protected $fillable = ['monitoring_activity_adendum_guest_id','file'];
}
