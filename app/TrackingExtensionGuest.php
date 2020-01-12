<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class TrackingExtensionGuest extends Model
{
    protected $table = 'tracking_extension_guest';
    protected $fillable = ['extension_guest_id','role_id','status', 'approval', 'reason'];

    public function proposal() {
        return $this->belongsTo(ExtensionGuest::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
