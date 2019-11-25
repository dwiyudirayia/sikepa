<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $fillable = ['created_by', 'updated_by', 'name', 'job', 'testimoni', 'active', 'photo'];
}
