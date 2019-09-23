<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agencies';
    protected $fillable = ['created_by','updated_by','name','address','latitude','longitude'];
}
