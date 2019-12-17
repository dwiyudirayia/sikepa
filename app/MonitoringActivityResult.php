<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringActivityResult extends Model
{
    protected $table = 'monitoring_activity_result';
    protected $fillable = ['monitoring_activity_id','evaluation','recomendation'];

    public function result() {
        return $this->hasOne(MonitoringActivity::class);
    }
}
