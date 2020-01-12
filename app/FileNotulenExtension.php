<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileNotulenExtension extends Model
{
    protected $table = 'file_notulen_extension';
    protected $fillable = ['extension_id','created_by','name'];
}
