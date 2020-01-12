<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityAdendum extends Model
{
    protected $table = 'monitoring_activity';
    protected $fillable = [
        'adendum_id',
        'title_activity',
        'implementation_date',
        'location',
        'description_activities',
        'result_status',
    ];

    public function proposal()
    {
        return $this->belongsTo(Adendum::class);
    }
}
