<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class TrackingAdendum extends Model
{
    protected $table = 'tracking_adendum';
    protected $fillable = ['adendum_id','role_id','status', 'approval', 'reason'];

    public function proposal() {
        return $this->belongsTo(Adendum::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
