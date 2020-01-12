<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class DeputiPICAdendumGuest extends Model
{
    protected $table = 'deputi_pic_adendum_guest';
    protected $fillable = ['adendum_guest_id','role_id','status', 'approval', 'reason'];

    public function proposal() {
        return $this->belongsTo(AdendumGuest::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
