<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class DeputiPICExtension extends Model
{
    protected $table = 'deputi_pic_extension';
    protected $fillable = ['extension_id','role_id','status', 'approval', 'reason'];

    public function proposal() {
        return $this->belongsTo(Extension::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
