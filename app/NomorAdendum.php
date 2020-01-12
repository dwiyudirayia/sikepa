<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorAdendum extends Model
{
    protected $table = 'nomor_adendum';
    protected $fillable = ['created_by','adendum_id','nomor'];
}
