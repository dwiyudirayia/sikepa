<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityExtensionGuest extends Model
{
    protected $table = 'monitoring_activity_extension_guest';
    protected $fillable = [
        'extension_guest_id',
        'title_activity',
        'implementation_date',
        'location',
        'description_activities',
        'result_status',
    ];

    public function proposal()
    {
        return $this->belongsTo(ExtensionGuest::class);
    }
    public function documentation() {
        return $this->hasMany(MonitoringActivityDocumentationExtensionGuest::class);
    }
}
