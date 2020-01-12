<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileNotulenAdendumGuest extends Model
{
    protected $table = 'file_notulen_adendum_guest';
    protected $fillable = ['adendum_guest_id','created_by','name'];
}
