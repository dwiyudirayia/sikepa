<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileNotulenAdendum extends Model
{
    protected $table = 'file_notulen_adendum';
    protected $fillable = ['adendum_id','created_by','name'];
}
