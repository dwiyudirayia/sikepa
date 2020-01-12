<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorAdendumGuest extends Model
{
    protected $table = 'nomor_adendum_guest';
    protected $fillable = ['created_by','adendum_guest_id','nomor'];
}
