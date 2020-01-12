<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityExtension extends Model
{
    protected $table = 'monitoring_activity_extension';
    protected $fillable = [
        'extension_id',
        'title_activity',
        'implementation_date',
        'location',
        'description_activities',
        'result_status',
    ];

    public function proposal()
    {
        return $this->belongsTo(Extension::class);
    }
}
