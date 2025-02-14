<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityAdendumGuest extends Model
{
    protected $table = 'monitoring_activity_adendum_guest';
    protected $fillable = [
        'adendum_guest_id',
        'title_activity',
        'implementation_date',
        'location',
        'description_activities',
    ];

    public function proposal()
    {
        return $this->belongsTo(AdendumGuest::class);
    }
    public function documentation() {
        return $this->hasMany(MonitoringActivityDocumentationAdendumGuest::class);
    }
}
