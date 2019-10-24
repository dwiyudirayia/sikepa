<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $fillable = ['user_id', 'testimoni', 'active'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeInactive($query) {
        return $query->where('active', 0);
    }
}
