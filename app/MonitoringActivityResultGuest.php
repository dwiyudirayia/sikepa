<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityResultGuest extends Model
{
    protected $table = 'monitoring_activity_guest_result';
    protected $fillable = ['monitoring_activity_guest_id','evaluation','recomendation'];

    public function result() {
        return $this->hasOne(MonitoringActivityGuest::class);
    }
}
